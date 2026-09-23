<?php

use App\Http\Controllers\PostWebController;
use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    // $user = User::find(2);
    // echo optional($user)->verified_at; // Optional helper (Laravel 5.5+)
    // $user?->verified_at; // Null safety operator , better than optional helper (PHP 8+)
    // echo "<br>";

    // echo str('Laravel Framework')->upper();
    // echo "<br> " . str('Laravel Framework')->slug();
    // echo "<br> " . str('Laravel')->contains('ara'); // true or false , 1 or 0
    // echo "<br> " . str('Hello World')->limit(5);
    // echo "<br> " . str('Hello World')->limit(5)->append(' <b>see more</b>');

    $nums = collect([1, 2, 3, 4, 5]);
    echo $nums->sum() . "<br>";

    echo $nums->filter(function ($num) {
        return $num > 2;
    }) . "<br>";

    echo $nums->map(function ($num) {
        return $num * 2;
    })->count() . "<br>";

    // User
    $posts = Post::all();
    echo $posts->pluck('title') . "<br><br>";

    echo $posts->where('status', 'published')->map(function ($post) {
        return $post->title;
    })->implode('<br>');
});

Route::get('/logs', function (PostWebController $postWebController) {
    $data = [
        "title" => "My first post",
        "subtitle" => "This is the subtitle of my first post",
        "body" => "This is the content of my first post",
        "image" => "https://example.com/image.jpg",
        "status" => "published",
        "user_id" => 2
    ];

    Log::info('Request data start:', $data);

    $request = Request::create('/posts-web', 'POST', $data);

    $postWebController->store($request);

    Log::info('Request data end:', $data);
});

Route::get('/logs-error-handler', function (PostWebController $postWebController) {
    $data = [
        "title" => "My first post",
        "subtitle" => "This is the subtitle of my first post",
        "body" => "This is the content of my first post",
        "image" => "https://example.com/image.jpg",
        "status" => "published",
        "user_id" => 1
    ];

    try {
        //code...
        $request = Request::create('/posts-web', 'POST', $data);

        $postWebController->store($request);
    } catch (\Throwable $th) {
        //throw $th;
        Log::error('Error occurred while storing post:', ['error' => $th->getMessage(), 'data' => $data]);
    }
});

Route::get('custom', function () {
    return view('errors.404');
});

Route::get('trasaction-db', function () {
    DB::beginTransaction();
    $user = User::create([
        "name" => "Ra Vattra",
        "email" => "ravattrasmartboy1@gmail.com",
        "password" => bcrypt("webcoding@gmail.com"),
    ]);

    $user = User::find(2);

    if (!$user) {
        DB::rollBack();
    }

    $user->update(['name' => 'updated']);
    DB::commit();
});

Route::get('transaction-db-error', function () {
    try {
        DB::beginTransaction();
        User::create([
            'name' => 'Ra Vattra',
            'email' => 'ravattrasmartboy7@gmail.com',
            'password' => bcrypt('secret123'),
        ]);
        $user = User::find(999); // This will return null since the user with ID 999 does not exist
        if (!$user) {
            throw new \Exception('User creation failed');
        }

        $user->update([
            'name' => 'Updated Name'
        ]);

        DB::commit();
    } catch (\Throwable $e) {
        DB::rollBack();
        throw $e;
    }
});