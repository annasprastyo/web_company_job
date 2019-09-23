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

Route::get('/', 'PageController@index');
Route::get('/login', 'AuthController@index');
Route::get('signup', 'AuthController@signup');
Route::post('loginPost', 'AuthController@loginPost');
Route::get('profile', 'AuthController@profile');
Route::get('logout', 'AuthController@logout');

Route::get('dashboard', 'DashboardController@index');
Route::get('user', 'UserController@index');

Route::get('job', 'JobController@index');
Route::get('DetailJob', 'JobController@DetailJob');

Route::get('department', 'DepartmentController@index');

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/user', function () {
//     return view('dashboard');
// });

// Route::get('/login', function () {
//     return view('login');
// });
