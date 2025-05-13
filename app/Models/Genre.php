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
            [
                'id' => 1,
                'name' => 'Fiksi',
                'description' => 'Karya sastra berdasarkan imajinasi pengarang'
            ],
            [
                'id' => 2,
                'name' => 'Non-Fiksi',
                'description' => 'Karya sastra berdasarkan fakta dan kejadian nyata'
            ],
            [
                'id' => 3,
                'name' => 'Misteri',
                'description' => 'Karya sastra dengan elemen teka-teki dan misteri'
            ],
            [
                'id' => 4,
                'name' => 'Romantis',
                'description' => 'Karya sastra bertemakan percintaan dan romantisme'
            ],
            [
                'id' => 5,
                'name' => 'Petualangan',
                'description' => 'Karya sastra mengenai perjalanan dan petualangan'
            ]
        ];
    }
}