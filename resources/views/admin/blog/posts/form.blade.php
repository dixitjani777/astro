@extends('admin.layout')

@section('title', $post->exists ? 'Edit Post' : 'New Post')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $post->exists ? 'Edit Post' : 'New Post' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ $post->exists ? route('admin.blog.posts.update', $post) : route('admin.blog.posts.store') }}">
                @csrf
                @if($post->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Slug</label>
                        <input class="form-control" name="slug" value="{{ old('slug', $post->slug) }}" placeholder="auto if empty">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="blog_category_id">
                            <option value="">Uncategorized</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}" @selected((int)old('blog_category_id', $post->blog_category_id)===$c->id)>{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Published at</label>
                        <input class="form-control" type="date" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Excerpt</label>
                        <textarea class="form-control" rows="3" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Featured image (max 1MB)</label>
                        <input class="form-control" type="file" name="image" accept="image/*">
                        @error('image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        @if($post->exists && $post->image_path)
                            <div class="mt-2">
                                <img src="{{ asset($post->image_path) }}" class="img-fluid rounded" style="max-height: 160px; object-fit: cover;" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" rows="12" name="content">{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta title</label>
                        <input class="form-control" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta description</label>
                        <input class="form-control" name="meta_description" value="{{ old('meta_description', $post->meta_description) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published))>
                            <span class="form-check-label">Published</span>
                        </label>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
