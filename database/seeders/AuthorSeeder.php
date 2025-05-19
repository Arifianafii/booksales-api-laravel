<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K. Rowling',
            'title' => 'Novelist',
            'genres' => 'Fantasy, Mystery',
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
            'title' => 'Professor',
            'genres' => 'Fantasy, Adventure',
        ]);

        Author::create([
            'name' => 'George Orwell',
            'title' => 'Essayist',
            'genres' => 'Dystopia, Political Fiction',
        ]);

        Author::create([
            'name' => 'F. Scott Fitzgerald',
            'title' => 'Short Story Writer',
            'genres' => 'Drama, Romance',
        ]);

        Author::create([
            'name' => 'Dan Brown',
            'title' => 'Thriller Author',
            'genres' => 'Thriller, Mystery',
        ]);
    }
}
