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

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

// Спиоск новостей
Route::get('/news/{idlist?}','NewsaitController@index', function ($idlist = 1) {})->where('idlist', '[0-9]');
Route::get('/news/{name?}','NewsaitController@showName', function ($name = null) {});

// Создание новости
Route::get('/create/new','NewsaitController@create');
Route::post('/create/new','NewsaitController@store');

//Редактировать
Route::get('/edit/new/{id?}','NewsaitController@edit',function ($id = 1) {})->where('id', '[0-9]');
Route::post('/update/new/{id?}','NewsaitController@update',function ($id = 1) {})->where('id', '[0-9]');

//Удаление новости
Route::get('/delet/new/{id?}','NewsaitController@destroy',function ($id = 1) {})->where('id', '[0-9]');