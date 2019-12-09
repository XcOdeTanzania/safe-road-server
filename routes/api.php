<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('report/{stationId}', 'ReportController@postReport');

//single report
Route::get('report/{id}', 'ReportController@getReport');

// Update report
Route::put('report/{id}', 'ReportController@putReport');

// Delete report
Route::delete('report/{id}', 'ReportController@deleteReport');

// View file
Route::get('report/img/{reportId}', ['uses' => 'ReportController@viewFile']);


/*****************User Routes ******************/
Route::get('users', 'UserController@getUsers');



/*****************Location Routes ******************/
// List location
Route::get('locations', 'LocationController@getLocations');

// Create new locations
Route::post('location', 'LocationController@postLocation');

// Delete location
Route::delete('location/{id}', 'LocationController@deleteLocation');


/*****************Acceleration Routes ******************/
// List Acceleration
Route::get('accelerations', 'AccelerationController@getAccelerations');

// Create new Acceleration
Route::post('acceleration', 'AccelerationController@postAcceleration');

// Delete Acceleration
Route::delete('acceleration/{id}', 'AccelerationController@deleteAcceleration');


/*****************Gyroscope Routes ******************/
// List Gyroscope
Route::get('gyroscopes', 'GyroscopeController@getGyroscopes');

// Create new Gyroscope
Route::post('gyroscope', 'GyroscopeController@postGyroscope');

// Delete Gyroscope
Route::delete('gyroscope/{id}', 'GyroscopeController@deleteGyroscope');
