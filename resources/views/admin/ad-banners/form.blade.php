@extends('admin.layout')

@section('title', $banner->exists ? 'Edit Banner' : 'New Banner')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="page-title mb-0">{{ $banner->exists ? 'Edit Banner' : 'New Banner' }}</h2>
            <div class="text-secondary">Sponsored/advertise banner</div>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('admin.ad-banners.index') }}">
            <i class="ti ti-arrow-left"></i>&nbsp;Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ $banner->exists ? route('admin.ad-banners.update', $banner) : route('admin.ad-banners.store') }}">
                @csrf
                @if ($banner->exists)
                    @method('put')
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title (optional)</label>
                        <input name="title" class="form-control" value="{{ old('title', $banner->title) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Placement</label>
                        <input name="placement" class="form-control" value="{{ old('placement', $banner->placement ?: 'sidebar') }}" placeholder="sidebar">
                        <div class="form-hint">Examples: sidebar, query_sidebar</div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Type</label>
                        <select id="banner_content_type" name="content_type" class="form-select">
                            @php($ct = old('content_type', $banner->content_type ?? 'image'))
                            <option value="image" @selected($ct === 'image')>Image</option>
                            <option value="html" @selected($ct === 'html')>Embed HTML (Google Ads)</option>
                            <option value="youtube" @selected($ct === 'youtube')>YouTube Video</option>
                        </select>
                        <div class="form-hint">HTML/YouTube banners ignore Link URL.</div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Sort order</label>
                        <input name="sort_order" type="number" min="0" class="form-control" value="{{ old('sort_order', $banner->sort_order ?? 0) }}">
                    </div>

                    <div class="col-md-6" data-banner-field="image">
                        <label class="form-label">Link URL (optional)</label>
                        <input name="link_url" class="form-control" value="{{ old('link_url', $banner->link_url) }}" placeholder="https://...">
                    </div>
                    <div class="col-12" data-banner-field="html">
                        <label class="form-label">Embed HTML</label>
                        <textarea name="embed_html" class="form-control" rows="6" placeholder="<script>...</script>">{{ old('embed_html', $banner->embed_html) }}</textarea>
                        <div class="form-hint">Only paste trusted code. It will be rendered as-is on the frontend.</div>
                    </div>
                    <div class="col-md-6" data-banner-field="youtube">
                        <label class="form-label">YouTube URL</label>
                        <input name="youtube_url" class="form-control" value="{{ old('youtube_url', $banner->youtube_url) }}" placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Active</label>
                        <label class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                            <span class="form-check-label">Enabled</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Starts at (optional)</label>
                        <input name="starts_at" type="datetime-local" class="form-control" value="{{ old('starts_at', optional($banner->starts_at)->format('Y-m-d\\TH:i')) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Ends at (optional)</label>
                        <input name="ends_at" type="datetime-local" class="form-control" value="{{ old('ends_at', optional($banner->ends_at)->format('Y-m-d\\TH:i')) }}">
                    </div>

                    <div class="col-md-6" data-banner-field="image">
                        <label class="form-label">Image {{ $banner->exists ? '(replace optional)' : '(required)' }}</label>
                        <input name="image" type="file" accept="image/*" class="form-control">
                        @if ($banner->exists)
                            <div class="mt-2">
                                <div class="text-secondary mb-1">Current:</div>
                                @if($banner->image_path)
                                    <img src="{{ asset($banner->image_path) }}" class="rounded" style="max-width: 280px; width: 100%; height: auto;" alt="">
                                @else
                                    <div class="text-secondary">—</div>
                                @endif
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

    <script>
        (function () {
            function syncBannerFields() {
                var sel = document.getElementById('banner_content_type');
                if (!sel) return;
                var type = sel.value || 'image';
                document.querySelectorAll('[data-banner-field]').forEach(function (el) {
                    el.style.display = (el.getAttribute('data-banner-field') === type) ? '' : 'none';
                });
            }
            document.addEventListener('change', function (e) {
                if (e.target && e.target.id === 'banner_content_type') syncBannerFields();
            });
            syncBannerFields();
        })();
    </script>
@endsection
