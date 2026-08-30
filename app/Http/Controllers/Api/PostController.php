<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
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
            'success' => true,
            'message' => 'all posts retrieved successfully',
            'data' => $post,
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //48. Validate the request data from the StorePostRequest class
        $validationUser = $request->validated();
        $validationUser['user_id'] = auth()->id(); // Add the authenticated user's ID to the validated data
        $post = Post::create($validationUser);

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $post
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        try {
            //code...
            $post = Post::findOrFail($id);
            return response()->json([
                'data' => $post,
                'success' => true,
                'message' => 'Post retrieved successfully'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

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
        try {
            //code...
            $post->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Post updated successfully',
                'data' => $post
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json([null], 204);
    }

    public function restore(string $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return response()->json(['message' => 'Post restored successfully'], 200);
    }
}
