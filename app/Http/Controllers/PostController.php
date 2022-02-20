<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latestWithTags()->paginate(Post::BIG_PAGINATE_SIZE);
        $tags = Tag::all();
        return view('post-catalog', ['posts'=>$posts, 'tags'=>$tags]);
    }

    public function show(Post $post)
    {
        return view('post', ['post'=>$post]);
    }

    public function byTag(Tag $tag)
    {
        $posts = Post::query()->ofTag($tag)->paginate(Post::BIG_PAGINATE_SIZE);
        return view('post-catalog', ['tags' => [$tag], 'posts' => $posts]);
    }
}
