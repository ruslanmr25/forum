<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users=\App\Models\User::factory(10)->create();


        $posts=Post::factory(200)->recycle($users)->create();
        $comments=Comment::factory(100)->recycle($users,$posts);

       $admin= \App\Models\User::factory()
       ->has(Post::factory(46))
       ->has(Comment::factory(120)->recycle($posts))
       ->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
