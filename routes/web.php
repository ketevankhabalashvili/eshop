<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as'=>'admin.'], function () {

    Route::get('/','App\Http\Controllers\Admin\MainController@main')->name('main');
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('orders', 'App\Http\Controllers\Admin\OrderController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('productImages', 'App\Http\Controllers\Admin\ProductImageController');
    Route::resource('advertisements', 'App\Http\Controllers\Admin\AdvertisementController');

});

Route::group(['prefix' => '', 'middleware' => ['auth', 'client']], function () {
    //
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('web');

