<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/shop', function () {
//     return view('shop');
// });
// Route::get('/detailProduct', function () {
//     return view('shop-details');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::get('/blogs', function () {
//     return view('blog');
// });
// Route::get('/blogDetail', function () {
//     return view('blog-details');
// });
// Route::get('/cart', function () {
//     return view('shopping-cart');
// });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });

//Show all Page
//Route::get('/{name?}',[MyController::class, 'index']);

//Products
Route::get('/tat-ca-san-pham', [ProductController::class,'all_products']);
Route::get('/', [HomeController::class,'home']);
// Route::get('/', function () {
//     return view('index');
// });
