<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'user_name' => 'test_user',
            'email' => 'test@example.com',
        ]);
        User::factory(10)->create();

        $categories = [
            'Technology',
            'Sports',
            'Healt',
            'Entertainment',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                // 'slug' => Str::slug($category),
            ]);
        }
        $this->call(JobSeeder::class);
        Post::factory(100)->create();
        // $this->call([
        //     PostSeeder::class
        // ]);
    }
}
