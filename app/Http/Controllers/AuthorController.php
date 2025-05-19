<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
 public function index() {
    $authors = Author::all();

    return view('authors.index', ['authors' => $authors]);
 }

 public function show($id) {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }
}