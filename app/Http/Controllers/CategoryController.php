<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::when($search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
        })->paginate(10);

        return view('categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $validated['image_path'] = '/storage/'.$path;
        }

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Categoría creada exitosamente.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);
        // Eliminar imagen si el checkbox está marcado
        if ($request->has('remove_image') && $category->image_path) {
            $oldImage = str_replace('/storage/', '', $category->image_path);
            Storage::disk('public')->delete($oldImage);
            $validated['image_path'] = null;
        }
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($category->image_path) {
                $oldImage = str_replace('/storage/', '', $category->image_path);
                Storage::disk('public')->delete($oldImage);
            }

            $path = $request->file('image')->store('categories', 'public');
            $validated['image_path'] = '/storage/'.$path;
        }

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Category $category)
    {
        if ($category->image_path) {
            $oldImage = str_replace('/storage/', '', $category->image_path);
            Storage::disk('public')->delete($oldImage);
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada exitosamente.');
    }
}
