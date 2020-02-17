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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/add/faq', 'HomeController@addfaq')->middleware('verified');
Route::post('/add/faq/post', 'HomeController@addfaqpost')->middleware('verified');
Route::get('/faq/softDelete/{faq_id}','HomeController@faqsoftDelete')->middleware('verified');
Route::get('/faq/edit/{faq_id}','HomeController@faqedit')->middleware('verified');
Route::post('/faq/edit/post', 'HomeController@editfaqpost')->middleware('verified');
Route::get('/faq/undo/{faq_id}','HomeController@faqundo')->middleware('verified');
Route::get('/faq/hardDelete/{faq_id}','HomeController@faqhardDelete')->middleware('verified');
