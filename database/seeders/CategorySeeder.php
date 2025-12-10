<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Science'],
            ['name' => 'Mathematics'],
            ['name' => 'English'],
            ['name' => 'Computer'],
            ['name' => 'History'],
            ['name' => 'Geography'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
