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
Route::get('/user/bike/show/{id}', 'App\Http\Controllers\User\BikeController@show')->name("user.bike.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name("cart.remove");
Route::get('/cart/removeAll', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");


//Admin Routes
Route::middleware(['auth.role:admin'])->group(function () {
    //Put all admin routes with prefix /admin
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
    Route::get('/admin/part/', 'App\Http\Controllers\Admin\PartController@showAll')->name('admin.part.showall');
    Route::get('/admin/part/create', 'App\Http\Controllers\Admin\PartController@create')->name('admin.part.create');
    Route::post('/admin/part/save', 'App\Http\Controllers\Admin\PartController@save')->name('admin.part.save');
    Route::get('/admin/part/show/{id}', 'App\Http\Controllers\Admin\PartController@show')->name('admin.part.show');
    Route::post('/admin/part/update/{id}', 'App\Http\Controllers\Admin\PartController@update')->name('admin.part.update');
    Route::delete('/admin/part/remove/{id}', 'App\Http\Controllers\Admin\PartController@remove')->name('admin.part.remove');
    Route::get('/admin/bike/', 'App\Http\Controllers\Admin\BikeController@showAll')->name("admin.bike.showAll");
    Route::get('/admin/bike/create', 'App\Http\Controllers\Admin\BikeController@create')->name("admin.bike.create");
    Route::post('/admin/bike/save', 'App\Http\Controllers\Admin\BikeController@save')->name("admin.bike.save");
    Route::get('/admin/bike/show/{id}', 'App\Http\Controllers\Admin\BikeController@show')->name("admin.bike.show");
    Route::delete('admin/bike/remove/{id}', 'App\Http\Controllers\Admin\BikeController@remove')->name("admin.bike.remove");
    Route::get('admin/bike/update/{id}', 'App\Http\Controllers\Admin\BikeController@update')->name("admin.bike.update");
    Route::patch('admin/bike/save/update/{id}', 'App\Http\Controllers\Admin\BikeController@saveUpdate')->name("admin.bike.save.update");
    Route::delete('admin/review/delete/{id}', 'App\Http\Controllers\Admin\ReviewController@delete')->name("admin.review.delete");
});


//User routes
Route::middleware(['auth.role:user'])->group(function () {
    //Put all user routes with prefix /user
    Route::get('/user', 'App\Http\Controllers\User\UserController@index')->name('user.index');
    Route::get('/user/bike/showAll', 'App\Http\Controllers\User\BikeController@showAll')->name("user.bike.showAll");
    Route::get('/user/bike/create', 'App\Http\Controllers\User\BikeController@create')->name("user.bike.create");
    Route::post('/user/bike/save', 'App\Http\Controllers\User\BikeController@save')->name("user.bike.save");
    Route::delete('user/bike/remove/{id}', 'App\Http\Controllers\User\BikeController@remove')->name("user.bike.remove");
    Route::get('user/bike/update/{id}', 'App\Http\Controllers\User\BikeController@update')->name("user.bike.update");
    Route::patch('user/bike/save/update/{id}', 'App\Http\Controllers\User\BikeController@saveUpdate')->name("user.bike.save.update");
    Route::get('user/review/create/{id}', 'App\Http\Controllers\User\ReviewController@create')->name("user.review.create");
    Route::post('user/review/save/{id}', 'App\Http\Controllers\User\ReviewController@save')->name("user.review.save");
    Route::delete('user/review/delete/{id}', 'App\Http\Controllers\User\ReviewController@delete')->name("user.review.delete");
    Route::get('/user/part/', 'App\Http\Controllers\User\PartController@showAll')->name('user.part.showall');
    Route::get('/user/part/show/{id}', 'App\Http\Controllers\User\PartController@show')->name('user.part.show');
    Route::get('/user/config/', 'App\Http\Controllers\User\UserController@config')->name('user.conf');
    Route::post('/user/config/update/', 'App\Http\Controllers\User\UserController@updateConfig')->name('user.update.conf');
});

//Auth routes
Auth::routes();
