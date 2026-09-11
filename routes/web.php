<?php

use App\Http\Controllers\PostWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.web.show');
Route::get('new-component', function () {
    return view('using-component');
});

Route::get('/page', function () {
    return view('page');
});

Route::resources([
    'posts-web' => PostWebController::class,
]);