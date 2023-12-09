<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'book_name',
        'author_id',
        'category_id',
        'average_rating',
        'voter'
        
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
    
    // public function averageRating()
    // {
    //     return $this->ratings()->avg('the_rating');
    // }

    public function recalculateAverageRating()
{
    $averageRating = $this->ratings()->avg('the_rating');
    $this->average_rating = $averageRating;
    $this->save();
}

// dalam BookController.php
// public function getAuthors()
// {
//     $authors = Book::select('author_id')->distinct()->get();
//     return response()->json($authors);
// }

// public function getBooksByAuthor($author)
// {
//     $books = Book::where('author_id', $author)->get();
//     return response()->json($books);
// }



}
