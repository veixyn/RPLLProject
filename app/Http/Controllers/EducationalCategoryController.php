<?php

namespace App\Http\Controllers;

use App\Models\EducationalCategory;
use Illuminate\Http\Request;

class EducationalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = EducationalCategory::paginate(20);
        return view('educational_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('educational_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store the category
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:255',
            'description' => 'nullable|string',
        ]);

        //Ubah menjadi lowercase
        $validated['slug'] = strtolower($validated['slug']);
        //Ganti spasi dengan dash (jika ada)
        $validated['slug'] = str_replace(' ', '-', $validated['slug']);

        $category = EducationalCategory::create($validated);

        return redirect()->route('educational-categories.index')->with('success', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EducationalCategory $educationalCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationalCategory $educationalCategory)
    {
        //Update the category
        return view('educational_category.edit', compact('educationalCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationalCategory $educationalCategory)
    {
        //Update the category
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:255|unique:educational_categories,slug,' . $educationalCategory->id,
            'description' => 'nullable|string',
        ]);

        //Ubah menjadi lowercase
        $validated['slug'] = strtolower($validated['slug']);
        //Ganti spasi dengan dash (jika ada)
        $validated['slug'] = str_replace(' ', '-', $validated['slug']);

        $educationalCategory->update($validated);

        return redirect()->route('educational-categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationalCategory $educationalCategory)
    {
        $educationalCategory->delete();

        return redirect()->route('educational-categories.index')->with('success', 'Category deleted successfully.');
    }
}
