<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\RatingSeeder;
use Database\Factories\AuthorFactory;
use Database\Factories\CategoryFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
             AuthorSeeder::class,
             CategorySeeder::class,
             BookSeeder::class,
             
            // Author::factory()->count(10)->create()
             RatingSeeder::class

        ]);

        
        // Author::factory()->count(5) ->create();
        // Category::factory()->count(2);

        // Book::factory()->count(2)
        //     // ->has(Author::factory()->count(2))
        
        // ->create();
    }
}
