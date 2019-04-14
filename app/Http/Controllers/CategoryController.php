<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest as Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {

        $category = Category::firstOrCreate($request->validated());
        return redirect()->back()->with(['success' => 'Kategori: ' . $category->name . ' Ditambahkan']);

    }

    public function edit(Category $kategori)
    {
         // $category = Category::findOrFail($id);
        // dd($kategori);
        return view('categories.edit', compact('kategori'));
    }

    public function update(Request $request, Category $kategori)
    {

        $kategori->update($request->validated());
        // $kategori->update($request->except('_token'));
        return redirect(route('kategori.index'))->with(['success' => 'Kategori: ' . $kategori->name . ' Diperbarui']);

        // Pelajaran dari Laravel 5.7 laravel-from-scratch episode 14
        // buat parameter Category $category
        // $category->update(request(['name', 'description']));
        // return redirect ...
    }

    public function destroy(Category $kategori)
    {
        $kategori->delete();
        return redirect()->back()->with(['success' => 'Kategori: ' . $kategori->name . ' Telah Dihapus']);
    }
}
