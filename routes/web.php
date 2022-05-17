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

Route::get('/index','homeController@index')->name('index');
Route::post('/login','loginController@login');
Route::get('/logout','loginController@logout');
Route::post('delete','loginController@delete');
Route::post('recovery', 'loginController@recovery');

Route::get('/add_store_page','addStoreController@index');
Route::post('/addstore','addStoreController@addstore');
Route::post('/disable','loginController@disable');
Route::post('/enable','loginController@enable');
Route::get('/store','storeController@index')->name('store');
Route::post('/store_login', 'storeController@store_login');
Route::get('/store_logout','storeController@store_logout');


Route::post('/edit_store_name', 'storeController@edit_store_name');
Route::get('/items','itemsController@index')->name('items');
Route::post('/item_add','itemsController@item_add');
Route::post('/item_delete','itemsController@item_delete');
Route::post('/item_update_page','itemsController@item_update_page');
Route::post('/item_update','itemsController@item_update');


Route::get('/','frontPageController@index')->name('front_page');
Route::get('/show/{id}', 'frontPageController@show');
Route::get('/order_page','orderController@order');

Route::get('/sales_bonus', 'loginController@sales_bonus');
Route::get('/show_store', 'storeController@show_store');
Route::get('/order_cust', 'storeController@order_cust');
Route::get('cust/{id}', 'storeController@cust');


Route::get('cust', 'custController@index');
Route::post('cust_login','custController@cust_login');
Route::get('cust_logout','custController@cust_logout');



