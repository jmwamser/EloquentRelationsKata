<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        Post::truncate();
        Comment::truncate();
        User::truncate();

        User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->email(),
        ]);

        $this->call([PostSeeder::class]);
        $this->call([CommentSeeder::class]);
    }
}
