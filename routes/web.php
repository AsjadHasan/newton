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


Route::get('/', 'FrontendController@welcome');
Route::get('/contact', 'FrontendController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add/faq', 'HomeController@addfaq');
Route::post('/add/faq/post', 'HomeController@addfaqpost');
