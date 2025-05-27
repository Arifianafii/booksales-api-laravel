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
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
            'title' => 'Professor',
        ]);

        Author::create([
            'name' => 'George Orwell',
            'title' => 'Essayist',
        ]);

        Author::create([
            'name' => 'F. Scott Fitzgerald',
            'title' => 'Short Story Writer',
        ]);

        Author::create([
            'name' => 'Dan Brown',
            'title' => 'Thriller Author',
        ]);
    }
}
