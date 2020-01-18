<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'AuthController@registerUser');
Route::post('/login', 'AuthController@login');

Route::get('/getCourses', 'CoursesController@getCourses');
Route::get('/getYears', 'YearsController@getYears');

//Sessions for different days of the week
Route::post('/mondaySessions', 'SessionsController@mondaySessions');
Route::post('/tuesdaySessions', 'SessionsController@tuesdaySessions');
Route::post('/wednesdaySessions', 'SessionsController@wednesdaySessions');
Route::post('/thursdaySessions', 'SessionsController@thursdaySessions');
Route::post('/fridaySessions', 'SessionsController@fridaySessions');

