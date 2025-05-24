<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Magical worlds and epic adventures.',
        ]);

        Genre::create([
            'name' => 'Science Fiction',
            'description' => 'Future tech and space exploration.',
        ]);

        Genre::create([
            'name' => 'Mystery',
            'description' => 'Crime-solving and suspense.',
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Love stories and emotions.',
        ]);

        Genre::create([
            'name' => 'Horror',
            'description' => 'Scary and supernatural stories.',
        ]);
    }
}
