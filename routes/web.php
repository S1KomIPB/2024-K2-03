<?php

use App\Models\Lab;
use App\Models\Post;
use App\Models\Jenjang;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;

// Normal Login
Route::get('/sign-in', [LoginController::class, 'index'])->name('sign-in')->middleware('guest');
Route::post('/sign-in', [LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Login page with redirection
Route::get('/sign-in-redirect', [LoginController::class, 'indexRedirect'])->name('login.redirect');

// Profile page
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

// Upload and storing to database
Route::get('/upload', [PostController::class, 'create'])->middleware('auth')->name('add.product');
Route::post('/store', [PostController::class, 'store'])->middleware('auth');

// check slug
Route::get('/checkSlug', [PostController::class, 'checkSlug'])->middleware('auth');

// Show home
Route::resource('/', PostController::class);

// Dashboard for Admin
Route::resource('/dashboard', AdminDashboardController::class)->middleware('admin');


// Show Post page     INI MASALAHNYA
Route::get('/post/{post:slug}', [PostController::class, 'show']);
// // Show Post page
// Route::get('/{post:slug}', [PostController::class, 'show']);



// search
// Route::get('/search', [PostController::class, 'searchPosts'])->name('search.posts');
Route::get('/', [PostController::class, 'search'])->name('search');

// search Admin
Route::post('/index', [PostController::class, 'searchPostsAdmin'])->name('searchPostsAdmin');

// not use currently -> for looking at products based on lab or jenjang category
Route::get('labs/{lab:slug}', function(Lab $lab){
    return view('home', [
        'title' => "Posts by : $lab->name",
        'products' => $lab->posts->load('lab', 'user'),
    ]);
});

Route::get('jenjangs/{jenjang:slug}', function(Jenjang $jenjang){
    return view('home', [
        'title' => "Posts by: $jenjang->name",
        'products' => $jenjang->posts->load('lab', 'user'),
    ]);
});

Route::post('/filter', [PostController::class, 'filterPost'])->name('filterPost');

Route::middleware('admin')->group(function () {

    Route::get('/products', [PostController::class, 'products'])->name('products');
    Route::get('/product/edit/{product}', [PostController::class, 'edit'])->name('product.edit');
    Route::post('/product_update/{product}', [PostController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{product}', [PostController::class, 'destroy'])->name('product.delete');

});
