<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200); // 200 OK is fine for no content, but 404 Not Found might also be considered depending on API design.
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $genres
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
            'description' => 'required|string'
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422); // 422 Unprocessable Entity for validation errors
        }
        
        // 3. insert data
        try {
            $genre = Genre::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            // 4. response 
            return response()->json([
                'success' => true,
                'message' => 'Resource added successfully!',
                'data' => $genre
            ], 201); // 201 Created for successful resource creation
        } catch (\Exception $e) {
            // Handle potential database insertion errors
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
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $genre
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
        $genre = Genre::find($id);
        
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }
        
        // 2. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Corrected: max225 to max:255
            'description' => 'required|string'
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
            'description' => $request->description,
        ];

        // 4. update data baru ke database
        try {
            $genre->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Resource updated successfully!', // Corrected message
                'data' => $genre
            ], 200); // 200 OK for successful update
        } catch (\Exception $e) {
            // Handle potential database update errors
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
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404); // 404 Not Found
        }

        try {
            $genre->delete();

            return response()->json([
                'success' => true,
                'message' => 'Delete resource successfully!',
            ], 200); // 200 OK for successful deletion
        } catch (\Exception $e) {
            // Handle potential database deletion errors
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete resource: ' . $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }
}
