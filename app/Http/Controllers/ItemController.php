<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('item', compact('items'));
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
            'name' => 'required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/'
        ], [
            'name.required' => 'Nama item tidak boleh kosong',
            'name.string' => 'Nama item harus berupa teks',
            'name.min' => 'Nama item minimal 3 karakter',
            'name.max' => 'Nama item maksimal 50 karakter',
            'name.regex' => 'Nama item hanya boleh berisi huruf',
        ]);

        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        return redirect()->route('item.index')->with('add', 'Item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('item_edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50|regex:/^[a-zA-Z\s]+$/'
        ], [
            'name.required' => 'Nama item tidak boleh kosong',
            'name.string' => 'Nama item harus berupa teks',
            'name.min' => 'Nama item minimal 3 karakter',
            'name.max' => 'Nama item maksimal 50 karakter',
            'name.regex' => 'Nama item hanya boleh berisi huruf',
        ]);

        $item->update($request->only(['name', 'price', 'stock']));
        return redirect()->route('item.index')->with('edit', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('delete', 'Item deleted successfully.');
    }
}
