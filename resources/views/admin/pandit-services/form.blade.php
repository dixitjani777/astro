@extends('admin.layout')

@section('title', $service->exists ? 'Edit Pandit Service' : 'New Pandit Service')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $service->exists ? 'Edit Pandit Service' : 'New Pandit Service' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.pandit-services.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $service->exists ? route('admin.pandit-services.update', $service) : route('admin.pandit-services.store') }}">
                @csrf
                @if($service->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" value="{{ old('title', $service->title) }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Order</label>
                        <input class="form-control" type="number" min="0" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active))>
                            <span class="form-check-label">Active</span>
                        </label>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Short Text</label>
                        <textarea class="form-control" rows="4" name="short_text">{{ old('short_text', $service->short_text) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image Path / URL</label>
                        <input class="form-control" name="image_path" value="{{ old('image_path', $service->image_path) }}" placeholder="images/services/question.jpg or https://...">
                        <div class="form-hint">If you use a relative path, it will be loaded via `asset()`.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Link URL</label>
                        <input class="form-control" name="link_url" value="{{ old('link_url', $service->link_url) }}" placeholder="/panditji/puja-services">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

