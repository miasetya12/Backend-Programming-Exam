<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'ratings';
    protected $primaryKey = 'rating_id';
    public $timestamps = false;

    protected $fillable = [
        'rating_id',
        'book_id',
        'the_rating',
    ];
    
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
    

}
