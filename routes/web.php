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


Route::get('/register', 'AuthController@registrationForm');
Route::post('/register', 'AuthController@registerUser');

Route::get('/admin', 'AuthController@loginForm');
Route::post('/admin', 'AuthController@login');

Route::get('/logout', 'AuthController@logout');


Route::get('/home', 'PagesController@home'); //->middleware('auth');
Route::get('/course', 'PagesController@music'); //->middleware('auth');
Route::get('/image', 'PagesController@image'); //->middleware('auth');
Route::get('/session', 'PagesController@session'); //->middleware('auth');


Route::post('/course/upload', 'CoursesController@store');
Route::post('/unit/upload', 'UnitsController@store');
Route::post('/session/upload', 'SessionsController@store');

Route::get('/mondaySessions', 'SessionsController@mondaySessions');



//Route::post('/delete_song/{id}', 'SongsController@delete');
