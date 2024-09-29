<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'data' => $posts,
            'success' => true,
            'message' => 'Posts fetched successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->where('_id', $id)->first();
        return response()->json([
            'data' => $post,
            'success' => true,
            'message' => 'Post fetched successfully',
        ]);
    }

}
