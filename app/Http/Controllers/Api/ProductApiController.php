<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductApiController extends Controller
{
    // GET ALL
    public function index()
    {
        $product = Product::with('category')->get();

        return response()->json([
            'message' => 'Data product berhasil diambil',
            'data' => $product
        ], 200);
    }

    // GET BY ID
    public function show(int $id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data product ditemukan',
            'data' => $product
        ], 200);
    }

    // POST
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
    'name' => 'required',
    'price' => 'required',
    'qty' => 'required',
    'category_id' => 'required',
]);

            $validated['user_id'] = Auth::id();

            $product = Product::create($validated);

            return response()->json([
                'message' => 'Product berhasil ditambahkan',
                'data' => $product
            ], 201);

        } catch (\Throwable $e) {

    return response()->json([
        'message' => $e->getMessage()
    ], 500);
}
    }

    // PUT
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Product berhasil diupdate',
            'data' => $product
        ], 200);
    }

    // DELETE
    public function destroy(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product berhasil dihapus'
        ], 200);
    }
}