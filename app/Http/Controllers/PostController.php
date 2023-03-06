<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "All Posts",
            "active" => "post",
            "posts" => Post::latest()->filter(request(['search', 'category']))->get() /* eager loading */
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Post Detail",
            "active" => "post",
            "post" => $post
        ]);
    }
}
