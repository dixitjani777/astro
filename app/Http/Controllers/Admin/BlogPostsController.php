<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogPostsController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::query()->with('category')->latest();
        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where('title', 'like', "%{$q}%")->orWhere('slug', 'like', "%{$q}%");
        }

        return view('admin.blog.posts.index', [
            'posts' => $query->paginate(25)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.blog.posts.form', [
            'post' => new BlogPost(),
            'categories' => BlogCategory::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'blog_category_id' => ['nullable', 'integer', 'exists:blog_categories,id'],
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200', 'unique:blog_posts,slug'],
            'excerpt' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'max:1024'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeImage($request);
        }

        BlogPost::create($data);
        return redirect()->route('admin.blog.posts.index')->with('status', 'Post created.');
    }

    public function edit(BlogPost $post)
    {
        return view('admin.blog.posts.form', [
            'post' => $post,
            'categories' => BlogCategory::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, BlogPost $post)
    {
        $data = $request->validate([
            'blog_category_id' => ['nullable', 'integer', 'exists:blog_categories,id'],
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', 'unique:blog_posts,slug,' . $post->id],
            'excerpt' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'max:1024'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeImage($request);
        }

        $post->update($data);
        return redirect()->route('admin.blog.posts.index')->with('status', 'Post updated.');
    }

    private function storeImage(Request $request): string
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $filename = Str::uuid() . '.' . $ext;
        $relativeDir = 'uploads/blog';

        File::ensureDirectoryExists(public_path($relativeDir));
        $file->move(public_path($relativeDir), $filename);

        return "{$relativeDir}/{$filename}";
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();
        return redirect()->route('admin.blog.posts.index')->with('status', 'Post deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        BlogPost::query()->whereIn('id', $data['ids'])->get()->each->delete();
        return redirect()->route('admin.blog.posts.index')->with('status', 'Selected posts deleted.');
    }
}
