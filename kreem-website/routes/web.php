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

//User Routes start
Route::get('user/{user}', 'UsersController@show')->name('user.show');

Route::get('user/{user}/edit', 'UsersController@edit')->name('user.edit');

Route::patch('user/{user}', 'UsersController@update')->name('user.update');
//User Routes end



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
