
(function ($) {
    "use strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }    
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }    
    });


// Banner


$(document).ready(function() {
    $('#women_banner').click(function(e) {
        e.preventDefault();
        $('#women_form').submit();
    });

    $('#men_banner').click(function(e) {
        e.preventDefault();
        $('#men_form').submit();
    });

    $('#accessories_banner').click(function(e) {
        e.preventDefault();
        $('#accessories_form').submit();
    });
});


    /*==================================================================
    [ Cart ]*/
   
function renderCart(data) {
    let cartItemsHtml = '';
    let totalPrice = 0; 

    data.forEach(d => {
        totalPrice += d.price * d.quantity; 
        var imageUrl = d.image;
        var fullImageUrl = '/storage/' + imageUrl.replace('public/', '');
        cartItemsHtml += `
            <li class="header-cart-item flex-w flex-t m-b-12">
                <div class="header-cart-item-img delete-cart-item">
                     <img src="${fullImageUrl}" alt="${d.product_name}" data-id="${d.id}" class="img-cart">
                </div>
                <div class="header-cart-item-txt p-t-8">
                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                        ${d.product_name}
                    </a>
                    <span class="header-cart-item-info">
                        ${d.quantity} x $${d.price}
                    </span>
                </div>
            </li>`;
    });

    $('#total-cart').text(totalPrice.toFixed(2)); 
    $('#stripe-link').attr('href', function() {
        return '/stripe/' + totalPrice.toFixed(2);
    });
    $('.cart-list').html(cartItemsHtml);
    $('.js-panel-cart').addClass('show-header-cart');
}

$('.js-show-cart').on('click', function() {
    $.ajax({
        url: '/show_cart',
        method: 'GET',
        success: function(data) {
            console.log(data.length);
            renderCart(data);
            $('.cart-num').attr('data-notify', data.length);
            $('.cart-num').attr('data-notify');
        },
        error: function() {
            Swal.fire({
                title: "Please login!",
                text: "you must login before adding cart!",
                icon: "error", 
                customClass: {
                    container: 'z-index-alert',
                }
            });
        }
    });
});

$(document).on('click', '.delete-cart-item', function(e) {
    e.preventDefault();
    var $item = $(this);
    var itemId = $item.find('.img-cart').data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `/delete_cart_item/${itemId}`,
        method: 'DELETE',
        success: function(response) {
            if (response.success) {
                $item.parent('li').remove(); 
                $.ajax({
                    url: '/show_cart',
                    method: 'GET',
                    success: function(data) {
                        renderCart(data); 
                        $('.cart-num').attr('data-notify', data.length);
                        $('.cart-num').attr('data-notify');
                    },
                    error: function() {
                        alert('Error retrieving cart items.');
                    }
                });
            } else {
                alert('Failed to delete item.');
            }
        },
        error: function() {
            alert('Error deleting item.');
        }
    });
});

    
    
    

    

   

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) {
            $(this).next().val(numProduct - 1);
        }
    });
    

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });

     /*==================================================================
    [ Show Alert Cart ]*/
    $('#cash-pay').on('click', function() {
        $.ajax({
            url: '/show_cart',  
            method: 'GET',
            success: function(data) { 
                var cartdata = data;
                if (data.length === 0) {
                    Swal.fire({
                        title: "Empty Cart!",
                        text: "Your cart is empty. Please add items to the cart before proceeding.",
                        icon: "warning",
                        customClass: {
                            container: 'z-index-alert'
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Are you sure you confirm order by cash?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        customClass: {
                            container: 'z-index-alert'
                        },
                        showCancelButton: true,
                        confirmButtonColor: "green",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, procceed  the order!"
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/add_order',
                                method: 'POST',
                                data: {
                                    cart: cartdata,
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            title: "Success!",
                                            text: "Your cart is confirmed. You can check your order list.",
                                            icon: "success",
                                            customClass: {
                                                container: 'z-index-alert'
                                            }
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '/show_order';
                                            }
                                        });
                                    } 
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error:', error); 
                                    Swal.fire({
                                        title: "Error sending to Order!",
                                        text: "Your cart is inValid. Please try again.",
                                        icon: "error",
                                        customClass: {
                                            container: 'z-index-alert'
                                        }
                                    });
                                }
                            });
                             
                        }
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: "Error",
                    text: "Failed to check cart status.",
                    icon: "error",
                    customClass: {
                        container: 'z-index-alert'
                    }
                });
            }
        });
    });
    
    /*==================================================================
    [ Show modal1 ]*/
    //  ream
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        var productId = $(this).data('id');
        console.log(productId);
        // $('.js-modal1').addClass('show-modal1');
        $.ajax({
            url: '/get-product-details/'+productId,
            method: 'GET',
            success: function(data) {
               
                
                $('#modalName').text(data.product.product_name);
                $('#modalPrice').text(data.product.price);
                $('#modalDescription').text(data.product.description);
                $('#modalCategory').text(data.product.category);
                $('#productForm').attr('data-id', data.product.id);
                $('#productForm').attr('data-id');

                var imageUrl = data.product.image;
                var fullImageUrl = '/storage/' + imageUrl.replace('public/', '');
                var fullThumbUrl = fullImageUrl; 
                $('#imgProduct').attr('src', fullImageUrl);
                $('.zoom').attr('href', fullThumbUrl);

                var $select_color = $('.select-color');
                $select_color.empty();
                $select_color.append('<option>Choose an option</option>'); 
                data.colors.forEach(function(color) {
                    $select_color.append(`<option value="${color.id}">${color.name}</option>`);
                });

                var $select_size = $('.select-size');
                $select_size.empty();
                $select_size.append('<option>Choose an option</option>'); 
                data.sizes.forEach(function(size) {
                    $select_size.append(`<option value="${size.id}">${size.size}</option>`);
                });

                $('.js-modal1').addClass('show-modal1');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error); // Log detailed error information
                alert('Unable to fetch product details.');
            }
        });
        
    });
    $(document).ready(function() {
        $('#productForm').on('submit', function(e) {
            e.preventDefault(); 
        
            // First, check if the user is logged in
            $.get('/check-auth', function(response) {
                if (!response.auth) {
                    window.location.href = '/login'; // Redirect to login if not authenticated
                } else {
                    // Proceed with the existing form validation and submission
                    var selectSize = $('.select-size');
                    var selectColor = $('.select-color');
                    var isValid = true; 
        
                    if (selectSize.val() === 'Choose an option') {
                        $('#sizeAlert').removeClass('d-none');
                        isValid = false;
                    } else {
                        $('#sizeAlert').addClass('d-none');
                    }
        
                    if (selectColor.val() === 'Choose an option') {
                        $('#colorAlert').removeClass('d-none');
                        isValid = false; 
                    } else {
                        $('#colorAlert').addClass('d-none'); 
                    }
        
                    if (isValid) {
                       
                        var productId = $('#productForm').attr('data-id');
                        // var name = $('#modalName').text();
                        // var price = $('#modalPrice').text();
                        var sizeText = $('.select-size option:selected').text();
                        var colorText = $('.select-color option:selected').text();
                        var quantity = $('.num-product').val();
                        // var image = $('#imgProduct').attr('src');
                        // var category = $('#modalCategory').text();
             
                        $.ajax({
                            url: '/addCart/'+productId,
                            method: 'POST',
                            data: {
                                size: sizeText,
                                color: colorText,
                                quantity: quantity,
                                _token: $('meta[name="csrf-token"]').attr('content'),
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    // Show success message
                                    $('.alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                                      response.message +
                                                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                                      '<span aria-hidden="true">&times;</span>' +
                                                      '</button>' +
                                                      '</div>').show();
                                    
                                } else {
                                    // Handle other status or errors
                                    console.error('Error:', response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error); 
                                alert('Unable to fetch product details.');
                            }
                        });
                    }
                }
            });
        });
        
    });
    
    
    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });
      




})(jQuery);