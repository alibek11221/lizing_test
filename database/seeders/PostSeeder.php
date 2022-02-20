<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $tags = Tag::all();
        if ($tags->count() > 0) {
            Post::factory()
                ->count(25)
                ->hasComments(10)
                ->create()
                ->each(function (Post $post) use ($tags) {
                    $post->tags()->sync($tags->random(3));
                });
        } else {
            Post::factory()
                ->count(10)
                ->hasTags(3)
                ->hasComments(10)
                ->create();
        }
    }
}
