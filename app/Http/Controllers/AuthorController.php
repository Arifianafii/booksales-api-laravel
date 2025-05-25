<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Not used in this snippet, but kept if needed elsewhere
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
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
            'name' => 'required|string|max:255', // Corrected: max225 to max:255
            'title' => 'required|string|max:255', // Corrected: max225 to max:255
            'genres' => 'nullable|string|max:255' // Added 'genres' and corrected max:255. Changed to nullable as it wasn't in the first store definition, but if it's always required, change back.
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }
        
        // 3. insert data
        try {
            $author = Author::create([
                'name' => $request->name,
                'title' => $request->title,
                'genres' => $request->genres ?? null, // Use null if 'genres' is not provided and is nullable
            ]);

            // 4. response 
            return response()->json([
                'success' => true,
                'message' => 'Resource added successfully!',
                'data' => $author
            ], 201); // 201 Created
        } catch (\Exception $e) {
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
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $author
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
        $author = Author::find($id);
        
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }
        
        // 2. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Corrected: max225 to max:255
            'title' => 'required|string|max:255', // Corrected: max225 to max:255
            'genres' => 'nullable|string|max:255' // Added 'genres' and corrected max:255.
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        // 3. siapkan data yang ingin diupdate
        $data = [
            'name' => $request->name,
            'title' => $request->title,
            'genres' => $request->genres ?? null, // Use null if 'genres' is not provided and is nullable
        ];

        // 4. update data baru ke database
        try {
            $author->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Resource updated successfully!', // Corrected message
                'data' => $author
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
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }

        try {
            $author->delete();

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
