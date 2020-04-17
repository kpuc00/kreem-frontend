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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/schedule', 'ScheduleController@index');

//User routes
Route::get('/edit', 'UsersController@edit')->name('user.edit');

Route::patch('update/{user}', 'UsersController@update')->name('user.update');


Route::get('/password/change', 'Auth\ChangePasswordController@index')->name('password.change');
Route::patch('/password/change', 'Auth\ChangePasswordController@update');

