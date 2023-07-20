<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->route()->parameter('page', 1);
        $length = $request->route()->parameter('length');

        return view('pages.posts', [
            'posts' => Post::query()
                ->when($length === 'small')->whereRaw('LENGTH(title) < 30')
                ->when($length === 'long')->whereRaw('LENGTH(title) > 40')
                ->simplePaginate(2, page: $page),
        ]);
    }

    public function show(Post $post)
    {
        return view('pages/post', [
            'post' => $post,
        ]);
    }
}
