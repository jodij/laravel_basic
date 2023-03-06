<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Jodi Jonathan",
        "email" => "jodi.jonathan@hotmail.com",
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:ref_id}', [PostController::class, 'show']);

Route::get('/categories', function (Category $category) {
    return view('categories', [
        "title" => "Post by Category : $category->name",
        "active" => "category",
        "categories" => Category::all()
    ]);
});
Route::get('/categories/{category:ref_id}', function (Category $category) {
    return view('posts', [
        "title" => "Post by Category : $category->name",
        "active" => "post",
        "posts" => $category->posts->load('category', 'author')
    ]);
});

Route::get('/authors/{author:ref_id}', function (User $author) {
    return view('posts', [
        "title" => "Post by Author : $author->name",
        "active" => "about",
        "posts" => $author->posts->load('category', 'author')
    ]);
});
