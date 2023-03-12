<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = "";
        if (request('category')) {
            $category = Category::firstWhere('ref_id', request('category'));
            $title = '  in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('ref_id', request('author'));
            $title = '  by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "post",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4)->withQueryString() /* eager loading */
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
