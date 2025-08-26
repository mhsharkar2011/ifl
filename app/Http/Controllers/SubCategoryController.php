<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $subCategories = SubCategory::all();
        return view('subcategories.index', ['subCategories' => $subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('subCategories.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
             'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        SubCategory::create($request->all());
        return redirect()->route('subCategories.index')->with('success', 'Sub Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subCategory $subCategory)
    {
          {
         if ($subCategory->products()->count() > 0) {
        return redirect()->route('subCategories.index')
            ->with('error', 'Cannot delete subCategory with existing products.');
    }

        try {
            $subCategory->delete();   // delete the subCategory

            return redirect()->route('subCategories.index')->with('success', 'subCategory deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('subCategories.index')
                ->with('error', 'Failed to delete subCategory: ' . $e->getMessage());
        }
    }
    }
}
