<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/', // Validasi tambahan untuk hanya huruf
        ], [
            'name.required' => 'Nama kategori tidak boleh kosong.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.min' => 'Nama kategori minimal 3 karakter.',
            'name.max' => 'Nama kategori maksimal 50 karakter.',
            'name.regex' => 'Nama kategori hanya boleh berisi huruf dan spasi.',
        ]);
    
        Category::create([
            'name' => $request->name,
        ]);
    
        return redirect()->route('category.index')->with('add', 'Category added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/', // Validasi tambahan untuk hanya huruf
        ], [
            'name.required' => 'Nama kategori tidak boleh kosong.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.min' => 'Nama kategori minimal 3 karakter.',
            'name.max' => 'Nama kategori maksimal 50 karakter.',
            'name.regex' => 'Nama kategori hanya boleh berisi huruf dan spasi.',
        ]);
    
        $category->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('category.index')->with('edit', 'Category added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index')->with('delete', 'Kategori berhasil dihapus!');
    }
}
