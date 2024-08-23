<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('posts', PostController::class);

Auth::routes();


Route::prefix('admin')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('posts', PostController::class);
    Route::resource('posts', PostController::class);
});
