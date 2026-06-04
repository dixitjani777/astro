@extends('admin.layout')

@section('title', 'Edit Daily Horoscope')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Daily Horoscope</h2>
                <div class="text-secondary">{{ ucfirst($entry->sign) }} — {{ $entry->for_date?->format('Y-m-d') }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.daily-horoscopes.index', ['date' => $entry->for_date?->toDateString(), 'sign' => $entry->sign]) }}" class="btn btn-outline-secondary">Back</a>
                @if(isset($section) && $section)
                    <a href="{{ route('admin.horoscope-contents.edit', $section) }}" class="btn btn-primary ms-2">Next: Edit Love/Career</a>
                @else
                    <a href="{{ route('admin.horoscope-contents.create', ['period' => 'daily', 'sign' => $entry->sign]) }}" class="btn btn-primary ms-2">Next: Add Love/Career</a>
                @endif
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.daily-horoscopes.update', $entry) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Admin Override Description (optional)</label>
                        <textarea class="form-control" rows="8" name="admin_description" placeholder="If filled, this will replace the API text on the frontend.">{{ old('admin_description', $entry->admin_description) }}</textarea>
                        <div class="form-hint">Leave empty and save to remove override and show API content again.</div>
                    </div>
                    <div class="col-12">
                        <div class="text-secondary">Current API description preview:</div>
                        <div class="border rounded p-3 bg-light">
                            {{ $entry->description ?: '—' }}
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
