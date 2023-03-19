<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function (){
    return view('dashboard.index');
})->middleware('auth');

//Route::get('/dashboard/posts/checkSlug', DashboardPostController::class, 'checkSlug')->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)
    ->except('show')
    ->middleware('admin');

