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

Route::get('/edit', function() {
    return view('edit');
});

Route::get('/password/change', 'Auth\ChangePasswordController@index')->name('password.change');
Route::patch('/password/change', 'Auth\ChangePasswordController@update');

Route::get('/profile', function() {
    return view('profile');
});

Route::prefix('json')->group(function (){
    Route::get('schedule', 'InternalAPI\ScheduleController@index');
    Route::get('schedule/{date}', 'InternalAPI\ScheduleController@index');

    Route::post('blockoffs', 'InternalAPI\AvailabilityController@blockOffShift');
    Route::delete('blockoffs/{id}', 'InternalAPI\AvailabilityController@removeBlockOffFromShift');
    Route::post('shifts/{shift}/callins', 'InternalAPI\AvailabilityController@callInForShift');

});
