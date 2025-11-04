<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $incomingFields = (array)$request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }

    public function showEditPost(Post $post) {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post'=> $post]);
    }
    public function deletePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $post->delete();
        return redirect('/');

    }

    public function editPost(Post $post, Request $request) {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $incomingFields = (array)$request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');
    }


}
