<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'price', 'stock'];
    
    public static function getAllBooks()
    {
        // Data untuk tabel Author
        return [
            ['id' => 1, 'title' => 'Harry Potter', 'description' => 'Fantasy magic novel', 'price' => 150000, 'stock' => 10],
            ['id' => 2, 'title' => 'The Hobbit', 'description' => 'Adventure in Middle Earth', 'price' => 120000, 'stock' => 5],
            ['id' => 3, 'title' => '1984', 'description' => 'Dystopian novel', 'price' => 130000, 'stock' => 8],
            ['id' => 4, 'title' => 'The Great Gatsby', 'description' => 'American classic', 'price' => 110000, 'stock' => 12],
            ['id' => 5, 'title' => 'Inferno', 'description' => 'Mystery thriller by Dan Brown', 'price' => 140000, 'stock' => 6],
        ];
    }
}