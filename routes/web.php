<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
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
//--------------------------------------------START-Frontend--------------------------------------------//
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');

//Product
Route::get('/chi-tiet-san-pham/{id}', 'App\Http\Controllers\ProductController@detail_product');
Route::post('/tim-kiem-san-pham', 'App\Http\Controllers\ProductController@search_product')->name('searchProduct');


//Brand
Route::get('/thuong-hieu/{id}', 'App\Http\Controllers\BrandController@show_brand');

//Cart
Route::get('/show-cart', 'App\Http\Controllers\CartController@showCart')->name('showCart');
Route::get('/add-to-cart/{id}', 'App\Http\Controllers\CartController@addToCart')->name('addToCart');
Route::get('/add-to-cart2/{id}', 'App\Http\Controllers\CartController@addToCart2')->name('addToCart2');
Route::get('/update-cart', 'App\Http\Controllers\CartController@updateCart')->name('updateCart');
Route::get('/delete-cart', 'App\Http\Controllers\CartController@deleteCart')->name('deleteCart');

//Checkout
Route::post('/login', 'App\Http\Controllers\CheckoutController@logIn')->name('logIn');
Route::get('/login-checkout', 'App\Http\Controllers\CheckOutController@logInCheckOut')->name('logInCheckOut');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckOutController@logOutCheckOut')->name('logOutCheckOut');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@addCustomer')->name('addCustomer');
Route::get('/check-out', 'App\Http\Controllers\CheckOutController@checkOut')->name('checkOut');
Route::post('/save-checkout', 'App\Http\Controllers\CheckOutController@saveCheckOut')->name('saveCheckOut');

//Forgot Password
Route::get('/forgot-password', 'App\Http\Controllers\CheckOutController@forgotPassword')->name('forgotPassword');
Route::post('/recover-pass', 'App\Http\Controllers\CheckoutController@recoverPass')->name('recoverPass');
Route::get('/update-pass', 'App\Http\Controllers\CheckOutController@updatePassword')->name('updatePassword');
Route::post('/save-new-pass', 'App\Http\Controllers\CheckoutController@saveNewPass')->name('saveNewPass');

//Comment
Route::post('/comment', 'App\Http\Controllers\ProductController@comment');
Route::post('/submit-comment', 'App\Http\Controllers\ProductController@submit_comment')->name('submitComment');


//--------------------------------------------END-Frontend--------------------------------------------//

//--------------------------------------------START-Backend----------------------------------------------//
Route::get('/admin',"App\Http\Controllers\AdminController@index");
Route::get('/dashboard',"App\Http\Controllers\AdminController@show_dashboard");
Route::post('/admin-dashboard',"App\Http\Controllers\AdminController@dashboard");
Route::get('/logout',"App\Http\Controllers\AdminController@logout");

//Category
Route::get('/add-category', 'App\Http\Controllers\CategoryController@add_cate');
Route::get('/edit-category/{id}', 'App\Http\Controllers\CategoryController@edit_cate');
Route::get('/delete-category/{id}', 'App\Http\Controllers\CategoryController@delete_cate');
Route::get('/all-category', 'App\Http\Controllers\CategoryController@all_cate');
Route::get('/active-category/{id}', 'App\Http\Controllers\CategoryController@active_cate');
Route::get('/unactive-category/{id}', 'App\Http\Controllers\CategoryController@unactive_cate');
Route::post('/save-category', 'App\Http\Controllers\CategoryController@save_cate');
Route::post('/update-category/{id}', 'App\Http\Controllers\CategoryController@update_cate');

//Brand
Route::get('/add-brand', 'App\Http\Controllers\BrandController@add_brand');
Route::get('/edit-brand/{id}', 'App\Http\Controllers\BrandController@edit_brand');
Route::get('/delete-brand/{id}', 'App\Http\Controllers\BrandController@delete_brand');
Route::get('/all-brand', 'App\Http\Controllers\BrandController@all_brand');
Route::get('/active-brand/{id}', 'App\Http\Controllers\BrandController@active_brand');
Route::get('/unactive-brand/{id}', 'App\Http\Controllers\BrandController@unactive_brand');
Route::post('/save-brand', 'App\Http\Controllers\BrandController@save_brand');
Route::post('/update-brand/{id}', 'App\Http\Controllers\BrandController@update_brand');

//Product
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{id}', 'App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');
Route::get('/active-product/{id}', 'App\Http\Controllers\ProductController@active_product');
Route::get('/unactive-product/{id}', 'App\Http\Controllers\ProductController@unactive_product');
Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{id}', 'App\Http\Controllers\ProductController@update_product');

//Comment
Route::get('/all-comment','App\Http\Controllers\CommentController@all_comment');
Route::get('/active-comment/{id}', 'App\Http\Controllers\CommentController@active_comment');
Route::get('/unactive-comment/{id}', 'App\Http\Controllers\CommentController@unactive_comment');
Route::post('/reply-comment', 'App\Http\Controllers\CommentController@reply_comment')->name('replyComment');
Route::get('/delete-comment/{id}', 'App\Http\Controllers\CommentController@delete_comment')->name('deleteComment');

//Order
Route::get('/manage-order','App\Http\Controllers\OrderController@manageOrder')->name('manageorder');
Route::get('/view-order/{id}','App\Http\Controllers\OrderController@viewOrder')->name('vieworder');
Route::post('/update-order', 'App\Http\Controllers\OrderController@updateOrder')->name('updateOrder');
Route::get('/history','App\Http\Controllers\OrderController@history')->name('history');
Route::get('/view-history-order/{id}','App\Http\Controllers\OrderController@viewHistoryOrder')->name('viewHistoryOrder');
Route::post('/cancel-order', 'App\Http\Controllers\OrderController@cancelOrder')->name('cancelOrder');



//--------------------------------------------END-Backend----------------------------------------------//
