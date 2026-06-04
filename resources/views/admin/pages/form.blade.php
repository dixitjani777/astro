@extends('admin.layout')

@section('title', $page->exists ? 'Edit Page' : 'New Page')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $page->exists ? 'Edit Page' : 'New Page' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $page->exists ? route('admin.pages.update', $page) : route('admin.pages.store') }}">
                @csrf
                @if($page->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" value="{{ old('title', $page->title) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Slug</label>
                        <input class="form-control" name="slug" value="{{ old('slug', $page->slug) }}" placeholder="auto if empty">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" rows="10" name="content">{{ old('content', $page->content) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta title</label>
                        <input class="form-control" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta description</label>
                        <input class="form-control" name="meta_description" value="{{ old('meta_description', $page->meta_description) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_published" value="1" @checked(old('is_published', $page->is_published))>
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

