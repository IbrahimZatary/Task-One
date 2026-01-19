<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;



use Illuminate\Http\Request;

//  flow for each function (Behave) on DB - validate / action> CRUD / redirect (route)
class ProductController extends Controller
{
    // show all products
    public function index()
    {
        // related into relation
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }







    public function create()
    {
            //  Create new product related into categ

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }



    // Store  product in db
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('categories.show', $request->category_id)
            ->with('success', 'Product created successfully!');
    }

    // Show single product with details
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    // Show form to edit product
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update product in DB
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $category_id = $product->category_id;
        $product->delete();

        return redirect()->route('categories.show', $category_id)
            ->with('success', 'Product deleted successfully!');
    }
}