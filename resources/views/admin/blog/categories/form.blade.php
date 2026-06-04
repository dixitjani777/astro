@extends('admin.layout')

@section('title', $category->exists ? 'Edit Category' : 'New Category')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $category->exists ? 'Edit Category' : 'New Category' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.blog.categories.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $category->exists ? route('admin.blog.categories.update', $category) : route('admin.blog.categories.store') }}">
                @csrf
                @if($category->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $category->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input class="form-control" name="slug" value="{{ old('slug', $category->slug) }}" placeholder="auto if empty">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="4" name="description">{{ old('description', $category->description) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

