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
}
