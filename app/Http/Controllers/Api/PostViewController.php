<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostViewController extends Controller
{
    public function increment(int $postId): \Illuminate\Http\JsonResponse
    {
        if ($counters = Cache::get(Post::VIEWS_COUNTER_CACHE_TAG)) {
            if (!array_key_exists($postId, $counters)){
                $post = Post::query()->findOrFail($postId);
                $counters[$postId] = $post->views_counter;
            }
            $counters[$postId]++;
            Cache::store()->put(Post::VIEWS_COUNTER_CACHE_TAG, $counters);
            return response()->json($counters[$postId]);
        }
        $post = Post::query()->findOrFail($postId);
        $post->views_counter++;
        $post->save();
        Cache::store()->put(Post::VIEWS_COUNTER_CACHE_TAG, [$postId => $post->views_counter]);
        return response()->json($post->views_counter);
    }
}
