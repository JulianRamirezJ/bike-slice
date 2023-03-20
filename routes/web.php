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
    Route::get('/admin/part/', 'App\Http\Controllers\Admin\PartController@showAll')->name('admin.part.showall');
    Route::get('/admin/part/create', 'App\Http\Controllers\Admin\PartController@create')->name('admin.part.create');
    Route::post('/admin/part/save', 'App\Http\Controllers\Admin\PartController@save')->name('admin.part.save');
    Route::get('/admin/part/show/{id}', 'App\Http\Controllers\Admin\PartController@show')->name('admin.part.show');
    Route::delete('/admin/part/remove/{id}', 'App\Http\Controllers\Admin\PartController@remove')->name('admin.part.remove');
    Route::get('/admin/bike/', 'App\Http\Controllers\Admin\BikeController@showAll')->name("admin.bike.showall");
    Route::get('/admin/bike/create', 'App\Http\Controllers\Admin\BikeController@create')->name("admin.bike.create");
    Route::post('/admin/bike/save', 'App\Http\Controllers\Admin\BikeController@save')->name("admin.bike.save");
    Route::get('/admin/bike/show/{id}', 'App\Http\Controllers\Admin\BikeController@show')->name("admin.bike.show");
    Route::delete('admin/bike/remove/{id}', 'App\Http\Controllers\Admin\BikeController@remove')->name("admin.bike.remove");
});

//User routes
Route::middleware(['auth.role:user'])->group(function () {
    //Put all user routes with prefix /user
    Route::get('/user', 'App\Http\Controllers\User\UserController@index')->name('user.index');
    Route::get('/user/showAll', 'App\Http\Controllers\User\BikeController@showAll')->name("user.bike.showAll");
    Route::get('/user/create', 'App\Http\Controllers\User\BikeController@create')->name("user.bike.create");
    Route::post('/user/save', 'App\Http\Controllers\User\BikeController@save')->name("user.bike.save");
    Route::get('/user/show/{id}', 'App\Http\Controllers\User\BikeController@show')->name("user.bike.show");
    Route::delete('/remove/{id}', 'App\Http\Controllers\User\BikeController@remove')->name("user.bike.remove");
});

//Auth routes
Auth::routes();
