<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User; // import User model
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure at least one user exists
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $postsData = [
            [
                'title' => 'Welcome to Our Blog',
                'slug' => Str::slug('Welcome to Our Blog'),
                'content' => 'This is the first post content.',
                'category_id' => 1,
                'user_id' => $user->id, // assign real user id
                'is_published' => 1,
                'published_at' => Carbon::now(),
                'excerpt' => 'This is a short excerpt.',
                'featured_image' => null,
                'is_active' => 1,
                'views_count' => 0,
            ],
            [
                'title' => 'News Update',
                'slug' => Str::slug('News Update'),
                'content' => 'Latest news and updates here!',
                'category_id' => 1,
                'user_id' => $user->id, // assign real user id
                'is_published' => 1,
                'published_at' => Carbon::now(),
                'excerpt' => 'Breaking news update.',
                'featured_image' => null,
                'is_active' => 1,
                'views_count' => 0,
            ]
        ];

        foreach ($postsData as $post) {
            Post::create($post);
        }
    }
}
