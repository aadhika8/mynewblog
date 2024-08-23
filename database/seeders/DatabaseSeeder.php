<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'aadhika8@myune.edu.au',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::factory(10)->has(Post::factory(10))->create([
            'role' => 'author'
        ]);
    }
}
