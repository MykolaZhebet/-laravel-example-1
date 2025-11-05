<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PostController::class, 'index'])
        ->name('dashboard');
    Route::get('/post/create', [PostController::class, 'create'])
        ->name('post.create');
    Route::get('/post/@{user_name}/{post:slug}', [PostController::class, 'show'])
        ->name('post.show');
    Route::post('/post/create', [PostController::class, 'store'])
        ->name('post.store');
});

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
