<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $incomingFields = $request->validate([
            'title' => 'required|max:255|unique:posts,title',
            'content' => 'required',
        ]);
        $incomingFields['user_id'] = Auth::user()->id;
        Post::create($incomingFields);
        return redirect('/posts');
    }

    public function newPost()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('new_post');
    }

    public function myPosts()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->get();
        return view('posts', compact('posts', 'user_id'));
    }

    public function show(Post $post)
    {
        return view('postDetails', compact('post'));
    }

    public function destroy(Post $post)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (Auth::user()->id !== $post->user_id) {
            return redirect('/posts');
        }
        $post->delete($post->id);
        return redirect('/posts')->with('success', 'Post deleted successfully');
    }

    public function edit(Post $post)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (Auth::user()->id !== $post->user_id) {
            return redirect('/posts');
        }
        return view('edit_post', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (Auth::user()->id !== $post->user_id) {
            return redirect('/posts');
        }
        $incomingFields = $request->validate([
            'title' => 'required|max:255|unique:posts,title',
            'content' => 'required',
        ]);
        $post->update($incomingFields);
        return redirect('/posts')->with('success', 'Post updated successfully');
    }
}
