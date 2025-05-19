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
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'description' => 'Adventure in Middle Earth',
            'price' => '120000',
            'stock' => '5',
        ]);

        Book::create([
            'title' => '1984',
            'description' => 'Dystopian novel',
            'price' => '130000',
            'stock' => '8',
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'description' => 'American classic',
            'price' => '110000',
            'stock' => '12',
        ]);

        Book::create([
            'title' => 'Inferno',
            'description' => 'Mystery thriller by Dan Brown',
            'price' => '140000',
            'stock' => '6',
        ]);
    }
}
