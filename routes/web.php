<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClapController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PublicProfileController;

Route::get('/welcome', function () {
    return view('welcome', [
        'greeting' => 'Hi there!'
    ]);
});





Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(2);
    // $jobs = Job::with('employer')->simplePaginate(2);
    $jobs = Job::with('employer')->cursorPaginate(2);
    return view('jobs', [
        'jobs' => $jobs
    ]);
});



Route::get('/jobs/{id}', function ($id) {
    // dd();
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', [PostController::class, 'index'])
    ->name('dashboard');
Route::get('/post/@{user_name}/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');
Route::get('/category/{category}', [PostController::class, 'category'])->name('posts.byCategory');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/post/create', [PostController::class, 'create'])
        ->name('post.create');
    Route::get('/my-posts', [PostController::class, 'myPosts'])
        ->name('myPosts');

    Route::post('/post/create', [PostController::class, 'store'])
        ->name('post.store');

    Route::put('/post/{post}', [PostController::class, 'update'])
        ->name('post.update');
    Route::get('/post/{post:slug}', [PostController::class, 'edit'])
        ->name('post.edit');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])
        ->name('post.destroy');

    Route::post('/follow/{user}', [FollowerController::class, 'followUnfollow'])->name('follow');
    Route::post('/clap/{post}', [ClapController::class, 'clap'])->name('clap');
});

//Route model binding
Route::get('/@{user:user_name}', [PublicProfileController::class, 'show'])->name('profile.show');

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
