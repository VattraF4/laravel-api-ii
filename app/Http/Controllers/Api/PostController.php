<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return [
        //     'status' => true,
        //     'posts' => [
        //         ['id' => 1, 'title' => 'My first post', 'content' => 'This is the content of my first post'],
        //         ['id' => 2, 'title' => 'My second post', 'content' => 'This is the content of my second post'],
        //     ],
        //     'message' => 'success'
        // ];

        $post = Post::all();
        return response()->json([
            'status' => true,
            'posts' => $post,
            'message' => 'all posts retrieved successfully'
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'body' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:draft,published,archived',
        ]);

        $post = Post::create($request->all());

        return response()->json([
            'post' => $post,
            'status' => true,
            'message' => 'Post created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $post = Post::findOrFail($id);
        // return response()->json([
        //     'post' => $post,
        //     'status' => true,
        //     'message' => 'Post retrieved successfully'
        // ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'subtitle' => 'sometimes|nullable|string|max:255',
            'body' => 'sometimes|required|string',
            // 'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'sometimes|nullable|string|max:255',
            'user_id' => 'sometimes|required|exists:users,id',
            'status' => 'sometimes|required|in:draft,published,archived',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json([
            'status' => true,
            'post' => $post,
            'message' => 'Post updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Post $id deleted successfully";

    }
}
