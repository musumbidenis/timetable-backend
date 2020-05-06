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


Route::get('/', 'AuthController@loginForm');
Route::post('/', 'AuthController@login');

Route::get('/register', 'AuthController@registrationForm');
Route::post('/register', 'AuthController@registerUser');

Route::get('/logout', 'AuthController@logout');

Route::get('/home', 'PagesController@home');
Route::get('/course', 'PagesController@course');
Route::get('/unit', 'PagesController@unit');
Route::get('/session', 'PagesController@session');

Route::post('/unit/upload', 'UnitsController@store');
Route::post('/session/upload', 'SessionsController@store');
