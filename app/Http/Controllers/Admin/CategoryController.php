<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin-panel.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin-panel.category.create');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin-panel.category.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus');
    }
}
