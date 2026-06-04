@extends('admin.layout')

@section('title', $slide->exists ? 'Edit Slide' : 'New Slide')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $slide->exists ? 'Edit Slide' : 'New Slide' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.home-sliders.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ $slide->exists ? route('admin.home-sliders.update', $slide) : route('admin.home-sliders.store') }}">
                @csrf
                @if($slide->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" value="{{ old('title', $slide->title) }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Order</label>
                        <input class="form-control" type="number" min="0" name="sort_order" value="{{ old('sort_order', $slide->sort_order) }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $slide->is_active))>
                            <span class="form-check-label">Active</span>
                        </label>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Subtitle</label>
                        <textarea class="form-control" rows="4" name="subtitle">{{ old('subtitle', $slide->subtitle) }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Button Text</label>
                        <input class="form-control" name="button_text" value="{{ old('button_text', $slide->button_text) }}" placeholder="Check it out">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Button URL</label>
                        <input class="form-control" name="button_url" value="{{ old('button_url', $slide->button_url) }}" placeholder="/gemstone/buy or https://...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image {{ $slide->exists ? '(replace optional)' : '(required)' }}</label>
                        <input class="form-control" type="file" name="image" accept="image/*" {{ $slide->exists ? '' : 'required' }}>
                        @if($slide->exists && $slide->image_path)
                            <div class="mt-2">
                                <div class="text-secondary mb-1">Current:</div>
                                <img src="{{ asset($slide->image_path) }}" class="rounded" style="max-width: 380px; width: 100%; height: auto;" alt="">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
