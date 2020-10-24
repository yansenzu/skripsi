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
//Route Abstrak
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/store', 'ProsesController@store')->name('store');



//Route categories
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/all','CategoriesController@all')->name('listcategories');
Route::post('/categories', 'CategoriesController@create')->name('inputcategories');
Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('editcategories');
Route::put('/categories/update/{id}', 'CategoriesController@update')->name('editcategories');
Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('deletecategories');

//Route judul
Route::get('/judul', 'JudulController@index')->name('judul');
Route::get('/judul/all','JudulController@all')->name('listjudul');
Route::post('/judul', 'JudulController@inputjudul')->name('inputjudul');
Route::put('/judul/{id}', 'JudulController@update')->name('editjudul');
Route::delete('/judul/{id}', 'JudulController@delete')->name('deletejudul');