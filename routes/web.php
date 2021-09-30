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
////
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


    Route::group(['middleware'=>'auth','prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');

        Route::group(['prefix'=>'users','as'=>'users.'],function(){
        Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\UsersController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('store');
        Route::get('/edit/{admin}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('edit');
        Route::post('/update/{admin}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('update');

    });
});
