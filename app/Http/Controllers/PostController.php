<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return view('posts.index', compact('posts'));
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);

        if (! Gate::allows('updated-post', $post)) {
            abort(403);
        }

        return $post->title;
    }
}
