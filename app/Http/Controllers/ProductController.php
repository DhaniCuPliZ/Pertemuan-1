<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;   // ✅ tambahkan
use App\Http\Requests\UpdateProductRequest;  // ✅ tambahkan
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|min:3|max:255',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'user_id' => 'required|exists:users,id',
    ], [
        'name.required' => 'Nama produk wajib diisi!',
        'name.min' => 'Nama minimal 3 karakter!',
        'quantity.required' => 'Quantity wajib diisi!',
        'quantity.integer' => 'Quantity harus berupa angka!',
        'price.required' => 'Harga wajib diisi!',
        'price.numeric' => 'Harga harus berupa angka!',
        'user_id.required' => 'User harus dipilih!',
    ]);

    // mapping quantity -> qty
    $validated['qty'] = $validated['quantity'];
    unset($validated['quantity']);

    Product::create($validated);

    return redirect()->route('product.index')
        ->with('success', 'Product berhasil ditambahkan!');
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('product.create', compact('users'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.view', compact('product'));
    }

    public function update(Request $request, $id)
    {
    $product = Product::findOrFail($id);

    $this->authorize('update', $product);

    $validated = $request->validate([
        'name' => 'required|string|min:3|max:255',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'user_id' => 'required|exists:users,id',
    ], [
        'name.required' => 'Nama produk wajib diisi!',
        'quantity.required' => 'Quantity wajib diisi!',
        'price.required' => 'Harga wajib diisi!',
        'user_id.required' => 'User harus dipilih!',
    ]);

    // mapping quantity -> qty
    $validated['qty'] = $validated['quantity'];
    unset($validated['quantity']);

    $product->update($validated);

    return redirect()->route('product.index')
        ->with('success', 'Product berhasil diupdate!');
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $users = User::orderBy('name')->get();
        return view('product.edit', compact('product', 'users'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->route('product.index')
            ->with('success','Product berhasil dihapus');
    }
}