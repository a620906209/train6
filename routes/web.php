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
Route::get('/index','homeController@index')->name('index');
Route::post('/login','loginController@login');
Route::get('/logout','loginController@logout');

Route::get('/add_store_page','addStoreController@index');
Route::post('/addstore','addStoreController@addstore');

Route::post('/disable','loginController@disable');
Route::get('/store','storeController@index')->name('store');
Route::post('/store_login', 'storeController@store_login');
Route::get('/store_logout','storeController@store_logout');

Route::post('/edit_store_name', 'storeController@edit_store_name');
