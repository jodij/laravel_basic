<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
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

Route::get('', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Jodi Jonathan",
        "email" => "jodi.jonathan@hotmail.com",
    ]);
});

Route::get('post', [PostController::class, 'index']);
Route::get('post/{post:ref_id}', [PostController::class, 'show']);

Route::get('categories/{category:ref_id}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});
