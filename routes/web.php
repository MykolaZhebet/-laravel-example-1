<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/', function () {
//     //        return view('welcome');
//     //        $posts = Post::where('user_id', auth()->id())->get();
//     $posts = [];
//     if (auth()->check()) {
//         $posts = auth()->user()->posts()->latest()->get();
//     }
//     return view('home', ['posts' => $posts]);
// });

// Route::post('/register', [UserController::class, 'register']);
// Route::post('/logout', [UserController::class, 'logout']);
// Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditPost']);
Route::put('/edit-post/{post}', [PostController::class, 'editPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


require __DIR__ . '/auth.php';
