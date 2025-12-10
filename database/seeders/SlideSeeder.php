<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slides')->insert([
            [
                'title' => 'Welcome to My Website',
                'description' => 'This is the first slide description.',
                'image' => 'slides/slide1.jpg', // Put this image in storage/app/public/slides
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Our Latest News',
                'description' => 'Check out the latest news here.',
                'image' => 'slides/slide2.jpg',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Join Our Community',
                'description' => 'Connect with us today.',
                'image' => 'slides/slide3.jpg',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
