<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return ['message' => "Hello API"];
});

Route::get('/post', function () {
    return [
        "title" => "My first post",
        "content" => "This is the content of my first post"
    ];
});

Route::get('/users', function () {
    return [
        'status' => true,
        'data' => [
            ['id' => 1, 'name' => 'Ra Vattra'],
            ['id' => 2, 'name' => 'Yan Pich'],
        ],
        'message' => 'success'
    ];
});

// Route::get('/posts', [PostController::class, 'index']);

Route::apiResource('posts', PostController::class);
Route::prefix('posts')->group(function () {
    Route::post('/{id}/restore', [PostController::class, 'restore']);
});