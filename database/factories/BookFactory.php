<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Book::class;
    public function definition(): array
    {   
        // $author = DB::table('authors')->inRandomOrder()->first();
        // $category = DB::table('categories')->inRandomOrder()->first();
        // if ($author) {
        //     if (property_exists($author, 'author_id')) {
        //         $authorId = $author->author_id;
        //         // Gunakan $penulisId sesuai kebutuhan Anda
        //     } 
        // // }
        // static $number = 1;

        return [
            // 'book_id'=>$number++,
            'book_name'=>$this->faker->sentence(),
            'author_id' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 300),
            
        ];
    }
}
