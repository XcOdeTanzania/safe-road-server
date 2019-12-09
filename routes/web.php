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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('export', 'StationController@export')->name('export');
Route::get('importExportView', 'StationController@importExportView');
Route::post('import', 'StationController@import')->name('import');

Route::get('/acceleration', 'AccelerationController@accelerations');
Route::get('/location', 'LocationController@locations');
Route::get('/gyroscope', 'GyroscopeController@gyroscopes');

