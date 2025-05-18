<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description'];
    
    public static function getAllGenres()
    {
        // Data untuk tabel Genre
        return [
            ['id' => 1, 'name' => 'Fantasy', 'description' => 'Magical worlds and epic adventures.'],
            ['id' => 2, 'name' => 'Science Fiction', 'description' => 'Future tech and space exploration.'],
            ['id' => 3, 'name' => 'Mystery', 'description' => 'Crime-solving and suspense.'],
            ['id' => 4, 'name' => 'Romance', 'description' => 'Love stories and emotions.'],
            ['id' => 5, 'name' => 'Horror', 'description' => 'Scary and supernatural stories.'],
        ];
    }
}