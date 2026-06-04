@extends('admin.layout')

@section('title', $content->exists ? 'Edit Horoscope Content' : 'New Horoscope Content')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $content->exists ? 'Edit Horoscope Content' : 'New Horoscope Content' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.horoscope-contents.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $content->exists ? route('admin.horoscope-contents.update', $content) : route('admin.horoscope-contents.store') }}">
                @csrf
                @if($content->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Period</label>
                        <select class="form-select" name="period" required>
                            @foreach($periods as $p)
                                <option value="{{ $p }}" @selected(old('period', $content->period) === $p)>{{ ucfirst($p) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Sign</label>
                        <input class="form-control" name="sign" value="{{ old('sign', $content->sign) }}" required placeholder="aries / general / daily ...">
                        <div class="form-hint">About/Report/Matching: <code>general</code>. Prediction: <code>daily</code>/<code>weekly</code>/<code>monthly</code>/<code>yearly</code>.</div>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $content->is_active))>
                            <span class="form-check-label">Active</span>
                        </label>
                    </div>

                    <div class="col-12">
                        <h3 class="h5 mb-2">Progress meters (0–100)</h3>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Health %</label>
                        <input class="form-control" type="number" min="0" max="100" name="health_percent" value="{{ old('health_percent', $content->health_percent) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Occupation %</label>
                        <input class="form-control" type="number" min="0" max="100" name="occupation_percent" value="{{ old('occupation_percent', $content->occupation_percent) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Wealth %</label>
                        <input class="form-control" type="number" min="0" max="100" name="wealth_percent" value="{{ old('wealth_percent', $content->wealth_percent) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Family %</label>
                        <input class="form-control" type="number" min="0" max="100" name="family_percent" value="{{ old('family_percent', $content->family_percent) }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Love Life %</label>
                        <input class="form-control" type="number" min="0" max="100" name="love_life_percent" value="{{ old('love_life_percent', $content->love_life_percent) }}">
                    </div>

                    <div class="col-12">
                        <h3 class="h5 mb-2">Page content (optional)</h3>
                        <div class="text-secondary">If set, this HTML replaces the default static content for supported pages.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Page Title (optional)</label>
                        <input class="form-control" name="title" value="{{ old('title', $content->title) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta Title (optional)</label>
                        <input class="form-control" name="meta_title" value="{{ old('meta_title', $content->meta_title) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Meta Description (optional)</label>
                        <input class="form-control" name="meta_description" value="{{ old('meta_description', $content->meta_description) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Content HTML (optional)</label>
                        <textarea class="form-control" rows="8" name="content_html">{{ old('content_html', $content->content_html) }}</textarea>
                    </div>

                    <div class="col-12 mt-3">
                        <h3 class="h5 mb-2">Section texts</h3>
                        <div class="text-secondary">If empty, the frontend keeps the existing default static text.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Love</label>
                        <textarea class="form-control" rows="4" name="love_text">{{ old('love_text', $content->love_text) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Career</label>
                        <textarea class="form-control" rows="4" name="career_text">{{ old('career_text', $content->career_text) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Health</label>
                        <textarea class="form-control" rows="4" name="health_text">{{ old('health_text', $content->health_text) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Money</label>
                        <textarea class="form-control" rows="4" name="money_text">{{ old('money_text', $content->money_text) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
