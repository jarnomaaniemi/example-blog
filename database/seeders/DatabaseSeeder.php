<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // see PostFactory class
        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id 
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id 
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id 
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id 
        ]);
    }
}
