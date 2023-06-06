<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        // Gate::allows('admin') return booloean
        // request()->user()->can('admin') return booloean
        // $this->authorize('admin') returns 403 page

        return view('posts.index', [
            // Getting posts using Query Scope in Post Model: scopeFilter
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

}
