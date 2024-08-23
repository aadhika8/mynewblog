<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('author.posts.create');
    }

    public function store(Request $request)
    {
        $postData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $postData['user_id'] = auth()->user()->id;
        Post::create($postData);

    return redirect()->route('author.posts.index')->with('success', 'Post created successfully.');
}

    public function show(Post $post)
    {
        if (!$post->user_id == auth()->user()->id) abort(403);
        return view('author.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (!$post->user_id == auth()->user()->id) abort(403);
        return view('author.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (!$post->user_id == auth()->user()->id) abort(403);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('author.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if (!$post->user_id == auth()->user()->id) abort(403);
        $post->delete();

        return redirect()->route('author.posts.index')->with('success', 'Post deleted successfully.');
    }
}
