<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\shop\ShopController;
use App\http\Controllers\AdminController;
use App\http\Controllers\Admin\CatagoryController;
use App\http\Controllers\Admin\OrderController;


use App\http\Controllers\Admin\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//.........shop...........
route::get('/',[ShopController::class,'index'])->name('shophome');
route::get('/products',[ShopController::class,'productsview'])->name('productpage');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //.....................customer dashboard..............
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //..............cart...................
    route::post('/addtocart/{id}',[ShopController::class,'addtocart'])->name('addtocart');
    route::get('/cart',[ShopController::class,'showcart'])->name('cart');
    route::get('/deletecart/{id}',[ShopController::class,'DeleteCart'])->name('DeleteCart');
    route::get('/Addqty/{id}',[ShopController::class,'Addqty'])->name('Addqty');
    route::get('/Minqty/{id}',[ShopController::class,'Minqty'])->name('Minqty');

    //..............purches.................
    route::get('/purchesoption',[ShopController::class,'purchesoption'])->name('purchesoption');
    route::post('/addorder',[ShopController::class,'addorder'])->name('addorder');
    Route::post('/stripe/{total}', [ShopController::class,'stripePost'])->name('stripe.post');



});

route::get('/home',[HomeController::class,'redirect']);

Route::prefix('admin/')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin'
])->group(function () {
    // ..........catagory routes...........
    route::get('catagories',[CatagoryController::class,'catagories'])->name('catagories');
    route::post('createcatagory',[CatagoryController::class,'CreateCatagory'])->name('AddCatagory');
    route::get('deletecatagory/{id}',[CatagoryController::class,'DeleteCatagory'])->name('DeleteCatagory');

    // ..........product routes...........
    route::get('addproductview',[ProductController::class,'AddProductview'])->name('addProductview');
    route::post('addproduct',[ProductController::class,'addproduct'])->name('addproduct');
    route::get('allproductsview',[ProductController::class,'allproductview'])->name('allproducts');
    route::get('deleteproduct/{id}',[ProductController::class,'DeleteProduct'])->name('DeleteProduct');
    route::get('editproduct/{id}',[ProductController::class,'EditProduct'])->name('EditProduct');
    route::post('updateproduct',[ProductController::class,'updateproduct'])->name('updateproduct');


//...................orders.......................

    route::get('orders',[OrderController::class,'orders'])->name('orders');
    route::get('completeorder/{id}',[OrderController::class,'completeorder'])->name('completeorder');
    route::get('completepayment/{id}',[OrderController::class,'completepayment'])->name('completepayment');



});

