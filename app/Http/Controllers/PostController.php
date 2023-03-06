<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();
        if (request('search')) {
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            "title" => "All Posts",
            "active" => "post",
            "posts" => $posts->get() /* eager loading */
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
