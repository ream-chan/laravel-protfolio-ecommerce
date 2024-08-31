<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @include('home.cssfile');
    <style>
        input[type="text"] {
            border: 2px solid black; 
            outline: none;          
            padding: 8px;          
            font-size: 16px;        
        }

        input[type="text"]:focus {
            border-color: black;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
  
    @include('home.header')
   <div class="container" style="margin-top: 10rem;">
    <div class="container">
            <div style="line-height: 1.5; color: black">
<span style="font-size : 22px; font-weight: bold">Please copy this info  below</span>     <p>Name: Test</p>
                 <p>Number: 4242 4242 4242 4242</p>
                 <p>CSV: 123</p>
                 <p> Expiration Month: 12 </p>
                 <p>Expiration Year: 2028</p>
            </div>
        @php
            $total = Session::has('success') ? 0 : $total;
        @endphp

<h1 style="font-size: 20px;">Pay By Credit Card Total : ${{ number_format($total, 2) }}</h1> <br>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                            <h3 class="panel-title" >Payment Details</h3>
                    </div>
                    <div class="panel-body">
        
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('error') }}</p>
                            </div>
                        @endif
        
                        <form 
                                role="form" 
                                action="{{ route('stripe.post', $total) }}" 
                                method="post" 
                                class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form">
                            @csrf
        
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control' size='4' type='text'>
                                </div>
                            </div>
        
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text'>
                                </div>
                            </div>
        
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
        
                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ({{$total}})</button>
                                </div>
                            </div>
                                
                        </form>
                    </div>
                </div>        
            </div>
        </div>
            
    </div>
   </div>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  
    $(function() {
      
        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/
        
        var $form = $(".require-validation");
         
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
        
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });
         
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
        
        });
          
        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                     
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
         
    });
    </script>
</html>