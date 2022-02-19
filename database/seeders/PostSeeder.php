<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->count(10)
            ->hasTags(2)
            ->hasComments(5)
            ->create();
    }
}
