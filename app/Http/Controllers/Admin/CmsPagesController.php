<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CmsPagesController extends Controller
{
    public function index(Request $request)
    {
        $query = CmsPage::query()->latest();
        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where('title', 'like', "%{$q}%")->orWhere('slug', 'like', "%{$q}%");
        }

        return view('admin.pages.index', [
            'pages' => $query->paginate(25)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.pages.form', ['page' => new CmsPage()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200', 'unique:cms_pages,slug'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        CmsPage::create($data);

        return redirect()->route('admin.pages.index')->with('status', 'Page created.');
    }

    public function edit(CmsPage $page)
    {
        return view('admin.pages.form', ['page' => $page]);
    }

    public function update(Request $request, CmsPage $page)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', 'unique:cms_pages,slug,' . $page->id],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'is_published' => ['nullable', 'boolean'],
        ]);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        $page->update($data);
        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    public function destroy(CmsPage $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        CmsPage::query()->whereIn('id', $data['ids'])->get()->each->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Selected pages deleted.');
    }
}
