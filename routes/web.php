<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/clients/{id}/likes', 'ClientController@likes')->name('clients.likes');
Route::resource('/clients', 'ClientController');
Route::resource('/histories', 'HistoryController')->only(['store', 'update', 'destroy']);
Route::resource('/tags', 'TagController')->only(['show']);
Route::resource('/categories', 'CategoryController');
Route::get('/users/likes', 'UserController@likes')->name('users.likes');

Route::get('/search/category/{id}', 'SearchController@byCategory')->name('search.category');
Route::get('/search/tag/{id}', 'SearchController@byTag')->name('search.tag');
Route::get('/search', 'SearchController@index')->name('search.index');
