<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoriesController extends Controller
{
    public function index()
    {
        return view('admin.blog.categories.index', [
            'categories' => BlogCategory::orderBy('name')->paginate(25),
        ]);
    }

    public function create()
    {
        return view('admin.blog.categories.form', ['category' => new BlogCategory()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'slug' => ['nullable', 'string', 'max:120', 'unique:blog_categories,slug'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        BlogCategory::create($data);
        return redirect()->route('admin.blog.categories.index')->with('status', 'Category created.');
    }

    public function edit(BlogCategory $category)
    {
        return view('admin.blog.categories.form', ['category' => $category]);
    }

    public function update(Request $request, BlogCategory $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'slug' => ['required', 'string', 'max:120', 'unique:blog_categories,slug,' . $category->id],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);
        $category->update($data);
        return redirect()->route('admin.blog.categories.index')->with('status', 'Category updated.');
    }

    public function destroy(BlogCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.blog.categories.index')->with('status', 'Category deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        BlogCategory::query()->whereIn('id', $data['ids'])->get()->each->delete();
        return redirect()->route('admin.blog.categories.index')->with('status', 'Selected categories deleted.');
    }
}
