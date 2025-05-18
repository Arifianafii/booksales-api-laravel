<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::getAllBooks();
        return view('books.index', compact('books'));
    }
    
    public function show($id)
    {
        $books = Book::getAllBooks();
        $book = collect($books)->firstWhere('id', $id);
        
        if (!$book) {
            abort(404);
        }
        
        return view('books.show', compact('book'));
    }
}