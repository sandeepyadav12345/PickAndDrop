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

//public routes: anyone can use this route

// Route::get('/sortedLocation/{x}/{y}', 'CustomerController@sortedLocation')->name('sortedLocation');
// Route::get('/getAllData', 'CustomerController@getAllData')->name('getAllData');
// Route::post('/register','AuthController@register','register')->name('register');

// //private routes: only authenticated users can only use these api
// //Route::group(['middleware' => ['auth:sanctum']], function () {

// Route::post('/insertLocation','CustomerController@insertLocation')->name('insertLocation');
// Route::delete('/destroy/{customer_id}','CustomerController@destroy')->name('destroy');
// Route::put('/updateLocation/{customer_id}','CustomerController@updateLocation')->name('updateLocation');

Route::group([
    //'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
Route::get('logout', 'AuthController@logout');
Route::get('user', 'AuthController@user');
//for sorting customer data in ascending order after passing latitude and longitude
Route::get('/sortedLocation/{x}/{y}', 'CustomerController@sortedLocation')->name('sortedLocation');
//geeting all data
Route::get('/getAllData', 'CustomerController@getAllData')->name('getAllData');
//inserting customer info with location lattitude and longitude
Route::post('/insertLocation','CustomerController@insertLocation')->name('insertLocation');
//delete data according to id
Route::delete('/destroy/{customer_id}','CustomerController@destroy')->name('destroy');
//updating data according to id
Route::put('/updateLocation/{customer_id}','CustomerController@updateLocation')->name('updateLocation');
    });
});