<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'bio'];
    
    public static function getAllAuthors()
    {
        // Data untuk tabel Author
        return [
            [
                'id' => 1,
                'name' => 'Pramoedya Ananta Toer',
                'email' => 'pramoedya@example.com',
                'bio' => 'Penulis Indonesia terkenal dengan Tetralogi Buru'
            ],
            [
                'id' => 2,
                'name' => 'Andrea Hirata',
                'email' => 'andrea@example.com',
                'bio' => 'Penulis novel Laskar Pelangi yang menginspirasi'
            ],
            [
                'id' => 3,
                'name' => 'Tere Liye',
                'email' => 'tere@example.com',
                'bio' => 'Penulis produktif dengan karya-karya best seller'
            ],
            [
                'id' => 4,
                'name' => 'Dee Lestari',
                'email' => 'dee@example.com',
                'bio' => 'Penulis novel Supernova dan Perahu Kertas'
            ],
            [
                'id' => 5,
                'name' => 'Eka Kurniawan',
                'email' => 'eka@example.com',
                'bio' => 'Penulis kontemporer dengan gaya unik'
            ]
        ];
    }
}