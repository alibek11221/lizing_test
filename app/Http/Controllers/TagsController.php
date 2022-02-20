<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class TagsController extends Controller
{
    public function postsByTag(Tag $tag)
    {
        return view('post-catalog', ['tags' => [$tag], 'posts' => $tag->posts()->paginate(Post::BIG_PAGINATE_SIZE)]);
    }
}
