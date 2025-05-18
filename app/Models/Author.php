<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'title', 'genres'];
    
    public static function getAllAuthors()
    {
        // Data untuk tabel Author
        return [
            ['id' => 1, 'name' => 'J.K. Rowling', 'title' => 'Novelist', 'genres' => 'Fantasy, Mystery'],
            ['id' => 2, 'name' => 'J.R.R. Tolkien', 'title' => 'Professor', 'genres' => 'Fantasy, Adventure'],
            ['id' => 3, 'name' => 'George Orwell', 'title' => 'Essayist', 'genres' => 'Dystopia, Political Fiction'],
            ['id' => 4, 'name' => 'F. Scott Fitzgerald', 'title' => 'Short Story Writer', 'genres' => 'Drama, Romance'],
            ['id' => 5, 'name' => 'Dan Brown', 'title' => 'Thriller Author', 'genres' => 'Thriller, Mystery'],
        ];
    }
}