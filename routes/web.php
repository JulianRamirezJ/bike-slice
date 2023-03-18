<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Public Routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

//Admin Routes
Route::middleware(['auth.role:admin'])->group(function () {
    //Put all admin routes with prefix /admin
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
    Route::get('/admin/create', 'App\Http\Controllers\Admin\AdminController@create')->name('admin.create');
});

//User routes
Route::middleware(['auth.role:user'])->group(function () {
    //Put all admin routes with prefix /admin
    Route::get('/user', 'App\Http\Controllers\User\UserController@index')->name('user.index');
});

//Auth routes
Auth::routes();
