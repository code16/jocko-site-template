<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->route()->parameter('page', 1);
        $length = $request->route()->parameter('length', 'all');
        $alpha = $request->route()->parameter('alpha', 'all');

        return view('pages.posts', [
            'posts' => Post::query()
                ->when($length === 'small')->whereRaw('LENGTH(title) < 30')
                ->when($length === 'long')->whereRaw('LENGTH(title) > 40')
                ->when($alpha === 'a-m')->whereRaw("UPPER(SUBSTR(title, 1, 1)) BETWEEN 'A' AND 'M'")
                ->when($alpha === 'n-z')->whereRaw("UPPER(SUBSTR(title, 1, 1)) BETWEEN 'N' AND 'Z'")
                ->simplePaginate(2, page: $page),
            'length' => $length,
            'alpha' => $alpha,
        ]);
    }

    public function show(Post $post)
    {
        return view('pages/post', [
            'post' => $post,
        ]);
    }
}
