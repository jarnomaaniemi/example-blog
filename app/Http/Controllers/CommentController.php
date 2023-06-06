<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        // validate
        request()->validate([
            'body' => ['required'],
        ]);

        // store comment
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request()->body
        ]);

        return back()->with('success', 'Your comment have been submitted');
    }
}
