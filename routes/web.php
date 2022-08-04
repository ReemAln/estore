<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\ProductController ;// as FrontendProductController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Backend\ProductController ;//as BackendProductController;

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



Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

//Route::resource('products',App\Http\Controllers\ProductController::class);
Route::resource('products',App\Http\Controllers\Backend\ProductController::class);

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/allProducts',[App\Http\Controllers\Backend\ProductController::class,'allProducts'])->name('allProducts');

Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('users',UserController::class);

Route::get('/datatables',function(){
return view('backend.datatables');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home1', function () {
//     return view('home1');
// });
// Route::get('/products',function ()
// {
//    return view('products');
// });

//Route::resource('products', [AdminProductController::class]);


//Route::get('/allusers',[UserController::class,'getAllUsers']);




//Route::resource('items', ItemController::class);

//Route::resource('products', ProductController::class)->middleware('auth')->except(['index','show']);