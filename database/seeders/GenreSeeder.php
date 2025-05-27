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
<<<<<<< HEAD
            'description' => 'Magical worlds and epic adventures.'
=======
            'description' => 'Magical worlds and epic adventures.',
>>>>>>> ba6352a56acf224075111c2d03053095babc5e19
        ]);

        Genre::create([
            'name' => 'Science Fiction',
<<<<<<< HEAD
            'description' => 'Future tech and space exploration.'
=======
            'description' => 'Future tech and space exploration.',
>>>>>>> ba6352a56acf224075111c2d03053095babc5e19
        ]);

        Genre::create([
            'name' => 'Mystery',
<<<<<<< HEAD
            'description' => 'Crime-solving and suspense.'
=======
            'description' => 'Crime-solving and suspense.',
>>>>>>> ba6352a56acf224075111c2d03053095babc5e19
        ]);

        Genre::create([
            'name' => 'Romance',
<<<<<<< HEAD
            'description' => 'Love stories and emotions.'
=======
            'description' => 'Love stories and emotions.',
>>>>>>> ba6352a56acf224075111c2d03053095babc5e19
        ]);

        Genre::create([
            'name' => 'Horror',
<<<<<<< HEAD
            'description' => 'Scary and supernatural stories.'
=======
            'description' => 'Scary and supernatural stories.',
>>>>>>> ba6352a56acf224075111c2d03053095babc5e19
        ]);
    }
}
