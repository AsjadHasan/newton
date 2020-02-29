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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add/faq', 'HomeController@addfaq');
Route::post('/add/faq/post', 'HomeController@addfaqpost');
Route::get('/faq/softDelete/{faq_id}','HomeController@faqsoftDelete');
Route::get('/faq/edit/{faq_id}','HomeController@faqedit');
Route::post('/faq/edit/post', 'HomeController@editfaqpost');
Route::get('/faq/undo/{faq_id}','HomeController@faqundo');
Route::get('/faq/hardDelete/{faq_id}','HomeController@faqhardDelete');

Route::get('/edit/profile/ChangePass','HomeController@editprofile');
Route::post('/change/pass','HomeController@changepass');
