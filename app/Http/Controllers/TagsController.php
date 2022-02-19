<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function postsByTag(Tag $tag)
    {
        return view('post-catalog', ['tags'=>[$tag], 'posts' =>$tag->posts()->get()]);
    }
}
