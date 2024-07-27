<?php
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts', 'PostController');