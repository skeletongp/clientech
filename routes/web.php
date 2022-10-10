<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'access')->name('access');
    Route::get('register', 'signup')->name('signup');
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');
});
Route::controller(ProductController::class)->group(function () {
    Route::get('products', 'index')->name('products');
    Route::get('products/search', 'search')->name('products.search');
    
});
Route::middleware(['auth'])->group(function () {
    
});
