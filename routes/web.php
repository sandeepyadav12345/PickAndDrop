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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'CustomerController@index')->name('home');

Route::get('/ip_details/{x}/{y}', 'CustomerController@ip_details')->name('ip_details');

Route::get('/sortedLocation/{x}/{y}', 'CustomerController@sortedLocation')->name('sortedLocation');

Route::post('/insertLocation','CustomerController@insertLocation')->name('insertLocation');