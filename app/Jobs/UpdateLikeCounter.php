<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateLikeCounter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        if (\Cache::has(Post::LIKES_COUNTER_CACHE_TAG)) {
            $postCounters = \Cache::get(Post::LIKES_COUNTER_CACHE_TAG);
            Post::query()
                ->whereIn('id', array_keys($postCounters))
                ->each(function (Post $post) use ($postCounters) {
                    $post->update(['likes_counter' => $postCounters[$post->id]]);
                });
            \Cache::forget(Post::LIKES_COUNTER_CACHE_TAG);
        }
    }
}
