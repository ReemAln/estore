<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home1', function () {
//     return view('home1');
// });
// Route::get('/products',function ()
// {
//    return view('products');
// });

//Route::resource('products', [AdminProductController::class]);

Route::resource('products',App\Http\Controllers\ProductController::class);




//Route::resource('items', ItemController::class);

//Route::resource('products', ProductController::class)->middleware('auth')->except(['index','show']);