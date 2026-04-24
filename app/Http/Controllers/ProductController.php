<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class ProductController extends Controller
{   
    public function index()
    {
        $products = Product::with(['user','category'])->paginate(10);
        return view('product.index', compact('products'));
    }

    // ================= CREATE FORM =================
    public function create()
    {
        $users = User::orderBy('name')->get();
        $categories = Category::all();

        return view('product.create', compact('users','categories'));
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Nama produk wajib diisi!',
            'name.min' => 'Nama minimal 3 karakter!',
            'quantity.required' => 'Quantity wajib diisi!',
            'quantity.integer' => 'Quantity harus berupa angka!',
            'price.required' => 'Harga wajib diisi!',
            'price.numeric' => 'Harga harus berupa angka!',
            'user_id.required' => 'User harus dipilih!',
            'category_id.required' => 'Category harus dipilih!',
        ]);

        // mapping quantity -> qty (nama kolom di database)
        $validated['qty'] = $validated['quantity'];
        unset($validated['quantity']);

        Product::create($validated);

        return redirect()->route('product.index')
            ->with('success', 'Product berhasil ditambahkan!');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.view', compact('product'));
    }

    // ================= EDIT FORM =================
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $users = User::orderBy('name')->get();
        $categories = Category::all();

        return view('product.edit', compact('product', 'users','categories'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        // mapping quantity -> qty
        $validated['qty'] = $validated['quantity'];
        unset($validated['quantity']);

        $product->update($validated);

        return redirect()->route('product.index')
            ->with('success', 'Product berhasil diupdate!');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->route('product.index')
            ->with('success','Product berhasil dihapus');
    }
}