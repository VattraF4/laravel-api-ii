<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return [
            'status' => true,
            'posts' => [
                ['id' => 1, 'title' => 'My first post', 'content' => 'This is the content of my first post'],
                ['id' => 2, 'title' => 'My second post', 'content' => 'This is the content of my second post'],
            ],
            'message' => 'success'
        ];
    }
}
