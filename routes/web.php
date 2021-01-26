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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/addProduct', 'ProductController@addProduct');

Route::get('/editProduct', 'ProductController@editProduct');

Route::get('/editProductById/{id}', 'ProductController@editProductById');

Route::post('/updateProduct', 'ProductController@updateProduct');

Route::post('/saveproduct', 'ProductController@saveproduct');

Route::get('/deleteProduct/{id}', 'ProductController@deleteProduct');

Route::get('/{name}/{id}', function ($name, $id) {
    return "<h1>This is ".$name."'s page and his id is ".$id."<h1>";
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
