<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateViewCounter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (\Cache::has(Post::VIEWS_COUNTER_CACHE_TAG)) {
            $postCounters = \Cache::get(Post::VIEWS_COUNTER_CACHE_TAG);
            Post::query()
                ->whereIn('id', array_keys($postCounters))
                ->each(function (Post $post) use ($postCounters) {
                    $post->update(['views_counter' => $postCounters[$post->id]]);
                });
            \Cache::forget(Post::VIEWS_COUNTER_CACHE_TAG);
        }
    }
}
