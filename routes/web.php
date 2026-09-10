<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.web.show');
Route::get('new-component', function () {
    return view('using-component');
});