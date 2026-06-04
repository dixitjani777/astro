@extends('admin.layout')

@section('title', $setting->exists ? 'Edit Setting' : 'New Setting')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $setting->exists ? 'Edit Setting' : 'New Setting' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $setting->exists ? route('admin.settings.update', $setting) : route('admin.settings.store') }}">
                @csrf
                @if($setting->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Key</label>
                        <input class="form-control" name="key" value="{{ old('key', $setting->key) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type</label>
                        <select class="form-select" name="type" required>
                            @php($type = old('type', $setting->type ?: 'string'))
                            @foreach(['string','text','json','bool','number'] as $t)
                                <option value="{{ $t }}" @selected($type===$t)>{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Value</label>
                        <textarea class="form-control" rows="6" name="value">{{ old('value', $setting->value) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

