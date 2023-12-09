<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $primaryKey = 'author_id';
    public $timestamps = false;

    protected $fillable = [
        'author_id',
        'author_name'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}
