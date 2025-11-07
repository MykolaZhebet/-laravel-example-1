<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // \DB::listen(function ($query) {
        //     \Log::info($query->sql);
        // });

        $user = auth()->user();
        $query = Post::with(['author', 'media'])
            ->where('published_at', '<=', now())
            ->withCount('claps')
            ->latest();

        if ($user) {
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->paginate(5);
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();
        // $image = $data['image'];
        // unset($data['image']);
        $data['user_id'] = auth()->user()->id;
        //Use sluggable trait which automatically generate slug
        // $data['slug'] = Str::slug($data['title']);

        // $imagePath = $image->store('posts', 'public');
        // $data['image'] = $imagePath;

        $post = Post::create($data);
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')
                ->toMediaCollection();
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $userName, Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !==  Auth::id()) {

            abort(403);
        }
        $categories = Category::get();
        return View('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {

        if ($post->user_id !==  Auth::id()) {
            abort(403);
        }
        $data = $request->validated();
        //Use sluggable trait which automatically generate slug
        // $data['slug'] = Str::slug($data['title']);
        $post->update($data);
        if ($data['image'] ?? false) {
            $post->addMediaFromRequest('image')
                ->toMediaCollection();
        }

        return redirect()->route('myPosts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !==  Auth::id()) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('dashboard');
    }

    public function category(Category $category)
    {
        $posts = $category->posts()
            ->with(['author', 'media'])
            ->where('published_at', '<=', now())
            ->withCount('claps')
            ->latest()
            ->paginate(5);

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function myPosts()
    {
        $user = auth()->user();
        $posts = $user->posts()
            ->with(['author', 'media'])
            ->withCount('claps')
            ->latest()
            ->paginate(5);
        $categories = Category::get();

        return view('post.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
