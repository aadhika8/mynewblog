<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('posts', PostController::class);

Auth::routes();
Route::get('/home', function () {
    if (!Auth::check()) return redirect()->route('login');
    return Auth::user()->hasRole('admin') ? redirect()->route('admin.home') : redirect()->route('author.home');

})->name('home');


Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('users', UserController::class);
    });

Route::prefix('author')
    ->as('author.')
    ->middleware(['auth', 'author'])
    ->group(function () {
        Route::get('/home', [App\Http\Controllers\Author\HomeController::class, 'index'])->name('home');
        Route::resource('posts', \App\Http\Controllers\Author\PostController::class);
    });
