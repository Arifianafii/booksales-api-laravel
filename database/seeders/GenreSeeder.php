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
            'name' => 'Action',
            'description' => 'Magical worlds and epic adventures.'
        ]);

        Genre::create([
            'name' => 'Action',
            'description' => 'Future tech and space exploration.'
        ]);

        Genre::create([
            'name' => 'Action',
            'description' => 'Crime-solving and suspense.'
        ]);

        Genre::create([
            'name' => 'Action',
            'description' => 'Love stories and emotions.'
        ]);

        Genre::create([
            'name' => 'Action',
            'description' => 'Scary and supernatural stories.'
        ]);
    }
}
