<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::getAllGenres();
        return view('genres.index', compact('genres'));
    }
    
    public function show($id)
    {
        $genres = Genre::getAllGenres();
        $genre = collect($genres)->firstWhere('id', $id);
        
        if (!$genre) {
            abort(404);
        }
        
        return view('genres.show', compact('genre'));
    }
}