<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('home.cssfile');
    <style>
  /* input:not(:focus) {
    background: none;
  } */
    table th {
      border-bottom: 2px solid black;
    }
  </style>
</head>
<body >
    @include('home.header')
   
    <div class="container"style="margin-top: 10rem;">
      <h1 class="ltext-103 cl5 text-center my-3">Your Order List</h1>
        <table class="table table-bordered" style="border: 2px solid black;">
            <thead >
                <tr>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Name</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Product Name</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Quantity</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Price</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Image</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Category</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Payment Status</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Delivery Status</th>
                  <th style="background-color:#717fe0;color:white;border-bottom: 2px solid black;">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($order as $i)
              <tr>
                  <td style="color: black">{{$i->name}}</td>
                  <td style="color: black">{{$i->product_name}}</td>
                  <td style="color: black">{{$i->quantity}}</td>
                  <td style="color: black">{{number_format($i->price, 0)."$"}}</td>
                  <td style="color: black">
                    @if ($i->image)
                        <img src="{{ Storage::url($i->image) }}" alt="Product Image" style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                  </td>
                  <td style="color: black">{{$i->category}}</td>
                  <td style="color: black">{{$i->payment_status}}</td>
                  <td style="color: black">{{$i->delivery_status}}</td> 
                   @if ($i->delivery_status == "pending")
                   <td style="color: black">
                    <a href="{{route('cancel',$i->id)}}" class="btn btn-danger">Cancel Order</a>
                   </td>
                  @else
                  <td style="color: black">
                    <p class="btn btn-info">No Acess</p>
                   </td>
                   @endif
                 
              </tr>
              @endforeach 
            </tbody>
          </table>
    </div>
</body>
</html>