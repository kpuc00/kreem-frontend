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

Route::get('/', 'UsersController@show')->name('home');
Route::get('/schedule', 'ScheduleController@index');

//User routes
Route::get('/profile', 'UsersController@show')->name('user.show');

Route::get('/edit', 'UsersController@edit')->name('user.edit');

Route::patch('update/{user}', 'UsersController@update')->name('user.update');


Route::get('/password/change', 'Auth\ChangePasswordController@index')->name('password.change');
Route::patch('/password/change', 'Auth\ChangePasswordController@update');

Route::prefix('json')->group(function (){
    Route::get('schedule', 'InternalAPI\ScheduleController@index');
    Route::get('schedule/{date}', 'InternalAPI\ScheduleController@index');

    Route::get('blockoffs', 'InternalAPI\AvailabilityController@blockOffs');
    Route::get('blockoffs/{date}', 'InternalAPI\AvailabilityController@blockOffs');
    Route::post('blockoffs', 'InternalAPI\AvailabilityController@blockOffShift');
    Route::delete('blockoffs/{id}', 'InternalAPI\AvailabilityController@removeBlockOffFromShift');
    Route::post('shifts/{shift}/callins', 'InternalAPI\AvailabilityController@callInForShift');

});
