@extends('admin.layout')

@section('title', $offer->exists ? 'Edit Offer' : 'New Offer')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="page-title mb-0">{{ $offer->exists ? 'Edit Offer' : 'New Offer' }}</h2>
            <div class="text-secondary">Offer slider item</div>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('admin.offers.index') }}">
            <i class="ti ti-arrow-left"></i>&nbsp;Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ $offer->exists ? route('admin.offers.update', $offer) : route('admin.offers.store') }}">
                @csrf
                @if ($offer->exists)
                    @method('put')
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title (optional)</label>
                        <input name="title" class="form-control" value="{{ old('title', $offer->title) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Link URL (optional)</label>
                        <input name="link_url" class="form-control" value="{{ old('link_url', $offer->link_url) }}" placeholder="https://...">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sort order</label>
                        <input name="sort_order" type="number" min="0" class="form-control" value="{{ old('sort_order', $offer->sort_order ?? 0) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Active</label>
                        <label class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $offer->is_active) ? 'checked' : '' }}>
                            <span class="form-check-label">Enabled</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Starts at (optional)</label>
                        <input name="starts_at" type="datetime-local" class="form-control" value="{{ old('starts_at', optional($offer->starts_at)->format('Y-m-d\\TH:i')) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Ends at (optional)</label>
                        <input name="ends_at" type="datetime-local" class="form-control" value="{{ old('ends_at', optional($offer->ends_at)->format('Y-m-d\\TH:i')) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image {{ $offer->exists ? '(replace optional)' : '(required)' }}</label>
                        <input name="image" type="file" accept="image/*" class="form-control">
                        @if ($offer->exists)
                            <div class="mt-2">
                                <div class="text-secondary mb-1">Current:</div>
                                <img src="{{ asset($offer->image_path) }}" class="rounded" style="max-width: 280px; width: 100%; height: auto;" alt="">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">
                        <i class="ti ti-device-floppy"></i>&nbsp;Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

