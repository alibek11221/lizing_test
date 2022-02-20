<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->with('tags')->paginate(Post::BIG_PAGINATE_SIZE);
        $tags = Tag::all();
        return view('post-catalog', ['posts'=>$posts, 'tags'=>$tags]);
    }

    public function show(Post $post)
    {
        return view('post', ['post'=>$post]);
    }
}
