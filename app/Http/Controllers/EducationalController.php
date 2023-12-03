<?php

namespace App\Http\Controllers;

use App\Models\Educational;
use App\Models\EducationalCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;

class EducationalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationals = Educational::paginate(10);
        return view('educational.index', compact('educationals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $educationalCategories = EducationalCategory::all();
        return view('educational.create', compact('educationalCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string',
            'educational_category_id' => 'nullable|exists:educational_categories,id',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            // Validasi gambar
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Upload gambar dan dapatkan path gambar yang diupload
            $imagePath = $request->file('image')->store('public/images');

            $validated['image'] = $imagePath;
        }

        // Buat artikel baru
        $educational = Educational::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $validated['image'] ?? null,
            'educational_category_id' => $validated['educational_category_id'] ?? null,
        ]);

        return redirect()->route('educational.index')->with('success', 'Educational added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Educational $educational)
    {
        return view('educational.show', compact('educational'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Educational $educational)
    {
        $educationalCategories = EducationalCategory::all();
        return view('educational.edit', compact('educational', 'educationalCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Educational $educational)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string',
            'educational_category_id' => 'nullable|exists:educational_categories,id',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            // Validasi gambar
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Upload gambar dan dapatkan path gambar yang diupload
            $imagePath = $request->file('image')->store('public/images');

            // Hapus gambar lama jika ada
            if ($educational->image) {
                Storage::delete($educational->image);
            }

            $validated['image'] = $imagePath;
        }

        // Buat artikel baru
        $educational->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $validated['image'] ?? $educational->image,
            'educational_category_id' => $validated['educational_category_id'] ?? null,
        ]);

        return redirect()->route('educational.index')->with('success', 'Educational updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Educational $educational)
    {
        if ($educational->image) {
            Storage::delete($educational->image);
        }

        $educational->delete();
        return redirect()->route('educational.index')->with('success', 'Educational deleted successfully.');
    }
}
