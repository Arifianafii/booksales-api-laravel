<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
 public function index() {
    $authors = Author::all();

    if ($authors->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Resource data not found!"
        ], 200);
    }

    return response()->json([
        "success" => true,
        "message" => "Get all resources",
        "data" => $authors
    ], 200);
 }

 public function show($id) {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }

    public function store(Request $request) {
    // 1. validator
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max225',
        'title' => 'required|string|max225',
        'genres' => 'required|string|max225'
    ]);

    // 2. check validator error
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => $validator->errors()
        ], 422);
    }
    
    // 3. insert data
    $author = Author::create([
        'name' => $request->name,
        'title' => $request->title,
        'genres' => $request->genres,
    ]);

    // 4. response 
    return response()->json([
            'success' => true,
            'message' => 'Resource added successfully!',
            'data' => $author
        ], 201);
    }
}