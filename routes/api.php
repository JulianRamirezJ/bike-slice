<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bikes', 'App\Http\Controllers\Api\BikeController@showAll')->name("api.bike.showAll");
Route::get('/bikes/{id}', 'App\Http\Controllers\Api\BikeController@show')->name("api.bike.show");
Route::get('/bikes/top/{to}', 'App\Http\Controllers\Api\BikeController@showTop')->name("api.bike.showTop");
Route::get('/parts', 'App\Http\Controllers\Api\PartController@showAll')->name("api.part.showAll");
Route::get('/parts/{id}', 'App\Http\Controllers\Api\PartController@show')->name("api.part.show");