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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UserController');
Route::resource('posts','PostController');




Route::get('/register', 'RegistrationController@create')->name('register_custom');
Route::post('register', 'RegistrationController@store');
 
Route::get('/login', 'SessionsController@create')->name('login_custom');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');