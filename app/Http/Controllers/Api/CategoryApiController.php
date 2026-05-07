<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    // GET ALL
    public function index()
    {
        $category = Category::all();

        return response()->json([
            'message' => 'Data category berhasil diambil',
            'data' => $category
        ], 200);
    }

    // GET BY ID
    public function show(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data category ditemukan',
            'data' => $category
        ], 200);
    }

    // POST
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $category = Category::create($validated);

        return response()->json([
            'message' => 'Category berhasil ditambahkan',
            'data' => $category
        ], 201);
    }

    // PUT
    public function update(Request $request, int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required'
        ]);

        $category->update($validated);

        return response()->json([
            'message' => 'Category berhasil diupdate',
            'data' => $category
        ], 200);
    }

    // DELETE
    public function destroy(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category tidak ditemukan'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category berhasil dihapus'
        ], 200);
    }
}