<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->with('tags')->latest()->paginate(Post::SMALL_PAGINATE_SIZE);
        return view('index', ['posts' => $posts]);
    }
}
