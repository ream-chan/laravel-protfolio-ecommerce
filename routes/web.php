<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');
// product
Route::get('/listProduct', [AdminController::class, 'listProduct'])->name('listproduct');
Route::get('/addProduct', [AdminController::class, 'createProduct'])->name('addproduct');
Route::post('/storeProduct', [AdminController::class, 'storeProduct'])->name('storeproduct');
Route::get('/editProduct/{id}', [AdminController::class, 'editProduct'])->name('editproduct');
Route::put('/updateProduct/{id}', [AdminController::class, 'updateProduct'])->name('updateproduct');
Route::delete('/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteproduct');

//home product
Route::get('/get-product-details/{id}', [HomeController::class, 'getProductDetails']);
Route::get('/searchProduct', [HomeController::class, 'searchProduct'])->name('searchproduct');
Route::get('/searchWomen', [HomeController::class, 'searchWomen'])->name('search_women');
Route::get('/searchMen', [HomeController::class, 'searchMen'])->name('search_men');
Route::get('/searchAccessories', [HomeController::class, 'searchAccessories'])->name('search_accessories');
Route::get('/cart_page', [HomeController::class, 'cartPage'])->name('cartpage');
Route::post('/addCart/{id}', [HomeController::class, 'addCart'])->name('addcart');
Route::get('/check-auth', function() {
    return response()->json(['auth' => Auth::check()]);
});
Route::get('/show_cart', [HomeController::class, 'showCart'])->name('showcart');

Route::controller(HomeController::class)->group(function () {
    Route::get('stripe/{totalCart}', 'stripe')->name('stripe');
    Route::post('stripe/{totalCart}', 'stripePost')->name('stripe.post');
});

Route::delete('/delete_cart_item/{id}', [HomeController::class, 'deleteCartItem'])->name('deletecart');
Route::get('/show_order', [HomeController::class, 'orderList'])->name('orderpage');   
Route::post('/add_order', [HomeController::class, 'orderAdd'])->name('orderadd');   
Route::get('/cancel/{id}', [HomeController::class, 'cancel'])->name('cancel');   


Route::get('/listCategory', [AdminController::class, 'listCategory'])->name('listcategory');
Route::get('/addCategory', [AdminController::class, 'createCategory'])->name('addcategory');
Route::post('/storeCategory', [AdminController::class, 'storeCategory'])->name('storecategory');
Route::get('/editCategory/{id}', [AdminController::class, 'editCategory'])->name('editcategory');
Route::put('/updateCategory/{id}', [AdminController::class, 'updateCategory'])->name('updatecategory');
Route::delete('/deleteCategory/{id}', [AdminController::class, 'deleteCategory'])->name('deletecategory');

Route::get('search', [AdminController::class, 'search']);
Route::get('/listOrder', [AdminController::class, 'orderList'])->name('orderlist');
Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
Route::get('/payment/{id}', [AdminController::class, 'payment'])->name('payment');
Route::get('/pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');
      

