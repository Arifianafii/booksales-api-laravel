<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Harry Potter',
            'description' => 'Fantasy magic novel',
            'price' => '150000',
            'stock' => '10',
            'cover_photo' => 'Harrypotter.jpg',
            'genre_id' => 1,
            'author_id' => 1,

        ]);

        Book::create([
            'title' => 'The Hobbit',
            'description' => 'Adventure in Middle Earth',
            'price' => '120000',
            'stock' => '5',
            'cover_photo' => 'Thehobbit.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => '1984',
            'description' => 'Dystopian novel',
            'price' => '130000',
            'stock' => '8',
            'cover_photo' => '1984.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'description' => 'American classic',
            'price' => '110000',
            'stock' => '12',
            'cover_photo' => 'Thegreatgatsby.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);

        Book::create([
            'title' => 'Inferno',
            'description' => 'Mystery thriller by Dan Brown',
            'price' => '140000',
            'stock' => '6',
            'cover_photo' => 'Inferno.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ]);
    }
}
