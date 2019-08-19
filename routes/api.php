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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*****************Station Routes ******************/
// List stations
Route::get('stations', 'StationController@getStations');

// Create new station
Route::post('station', 'StationController@postStation');

// List single stations
Route::get('station/{id}', 'StationController@getStation');

// Update station
Route::put('station/{id}', 'StationController@putStation');

// Delete station
Route::delete('station/{id}', 'StationController@deleteStation');


/*****************Report Routes ******************/
// List reports
Route::get('reports', 'ReportController@getReports');

// Create new reports
Route::post('report', 'ReportController@postReport');

//single report
Route::get('report/{id}', 'ReportController@getReport');

// Update report
Route::put('report/{id}', 'ReportController@putReport');

// Delete report
Route::delete('report/{id}', 'ReportController@deleteReport');


/*****************User Routes ******************/
Route::get('users', 'UserController@getUsers');