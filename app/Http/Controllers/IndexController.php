<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->with('tags')->latest()->paginate(6);
        return view('index', ['posts'=>$posts]);
    }
}
