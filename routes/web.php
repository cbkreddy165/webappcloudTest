<?php

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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Products 
Route::get('/', 'Home@index');
Route::get('addProducts', 'Home@addProducts');
Route::post('saveProductData', 'Home@saveProductData');
Route::get('editProduct/{id}', 'Home@editProduct');
Route::post('deleteProduct', 'Home@deleteProduct');

Route::get('getProductsList', 'Home@getProductsList');