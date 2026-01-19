<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{





    public function index()
    {    // display the categories 

        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }


    //       create new category
    public function create()
    {
        return view('categories.create');
    }

    // store in DB
    public function store(Request $request)
    {
        // Quick validation 
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());
            //  after creation go to .index
        return redirect()->route('categories.index')
            ->with('success', 'Category was created ');
    }


    // Show 1 single category 
    public function show(Category $category)
    {
        $category->load('products');
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update category in DB
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }

    // Delete the  category
    public function destroy(Category $category)
    {

        $category->delete();
        //after deletion go to .index
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}









   

