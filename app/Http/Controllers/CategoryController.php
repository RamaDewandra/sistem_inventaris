<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Inventory::with('category')->latest()->get();
        return view('inventories.index', compact('inventories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('inventories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('inventories', 'public');
            $validated['image'] = $path;
        }

        Inventory::create($validated);

        return redirect()->route('inventories.index')->with('success', 'Inventory berhasil dibuat!');
    }

    public function show(Inventory $inventory)
    {
        return view('inventories.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        $categories = Category::all();
        return view('inventories.edit', compact('inventory', 'categories'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($inventory->image) {
                Storage::disk('public')->delete($inventory->image);
            }
            
            $path = $request->file('image')->store('inventories', 'public');
            $validated['image'] = $path;
        }

        $inventory->update($validated);

        return redirect()->route('inventories.index')->with('success', 'Inventory berhasil diperbarui!');
    }

    public function destroy(Inventory $inventory)
    {
        if ($inventory->image) {
            Storage::disk('public')->delete($inventory->image);
        }

        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Inventory berhasil dihapus!');
    }
}
