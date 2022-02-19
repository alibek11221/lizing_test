<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCommentRequest;
use App\Models\Post;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function store(AddCommentRequest $request, Post $post)
    {
        $post->comments()->create([$request->only('subject', 'body')]);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
