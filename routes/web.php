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
Route::post('/categories', 'CategoriesController@create')->name('inputcategories');
Route::put('/categories/{id}', 'CategoriesController@update')->name('editcategories');
Route::delete('/categories/{id}', 'CategoriesController@delete')->name('deletecategories');

//Route judul
Route::get('/judul', 'JudulController@index')->name('judul');