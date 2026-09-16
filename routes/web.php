<?php

use App\Http\Controllers\PostWebController;
use App\Models\User;
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

Route::get('/helper', function () {
    $user = User::find(2);
    echo optional($user)->verified_at; // Optional helper (Laravel 5.5+)
    $user?->verified_at; // Null safety operator , better than optional helper (PHP 8+)
    echo "<br>";

    echo str('Laravel Framework')->upper();
    echo "<br> " . str('Laravel Framework')->slug();
    echo "<br> " . str('Laravel')->contains('ara'); // true or false , 1 or 0
    echo "<br> " . str('Hello World')->limit(5);
    echo "<br> " . str('Hello World')->limit(5)->append(' <b>see more</b>');
});
