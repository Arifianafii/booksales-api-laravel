<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $books
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255', // Corrected: max:225 to max:255 for consistency
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id'
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        try {
            // 3. upload image
            $image = $request->file('cover_photo');
            $imagePath = $image->store('books', 'public'); // Store returns the path relative to the disk root

            // 4. insert data
            $book = Book::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'cover_photo' => basename($imagePath), // Store only the file name
                'genre_id' => $request->genre_id,
                'author_id' => $request->author_id,
            ]);

            // 5. response
            return response()->json([
                'success' => true,
                'message' => 'Resource added successfully!',
                'data' => $book
            ], 201); // 201 Created
        } catch (\Exception $e) {
            // If an error occurs, delete the uploaded image to prevent orphaned files
            if (isset($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            return response()->json([
                'success' => false,
                'message' => 'Failed to add resource: ' . $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $book
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(string $id, Request $request)
    {
        // 1. mencari data
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }
        
        // 2. validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255', // Corrected: max:225 to max:255 for consistency
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // 'nullable' for update
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        try {
            // 3. siapkan data yang ingin diupdate
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'genre_id' => $request->genre_id,
                'author_id' => $request->author_id,
            ];

            // 4. handle image (upload & delete old image)
            if ($request->hasFile('cover_photo')) {
                $image = $request->file('cover_photo');
                $newImagePath = $image->store('books', 'public');

                // Delete old cover photo if it exists
                if ($book->cover_photo && Storage::disk('public')->exists('books/' . $book->cover_photo)) {
                    Storage::disk('public')->delete('books/' . $book->cover_photo);
                }

                $data['cover_photo'] = basename($newImagePath); // Store only the file name
            }

            // 5. update data baru ke database
            $book->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Resource updated successfully!', // Corrected message
                'data' => $book
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update resource: ' . $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }

        try {
            // Delete cover photo from storage if it exists
            if ($book->cover_photo && Storage::disk('public')->exists('books/' . $book->cover_photo)) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Delete resource successfully!',
            ], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete resource: ' . $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }
}
