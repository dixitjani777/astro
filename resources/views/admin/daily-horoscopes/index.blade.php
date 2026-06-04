@extends('admin.layout')

@section('title', 'Daily Horoscope Entries')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Daily Horoscope Entries</h2>
                <div class="text-secondary">Edit the main “today” text shown on `/horoscope/daily/{sign}`.</div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get" action="{{ route('admin.daily-horoscopes.index') }}">
                <div class="col-md-3">
                    <label class="form-label">Date</label>
                    <input class="form-control" type="date" name="date" value="{{ request('date', $date) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sign</label>
                    <select class="form-select" name="sign">
                        <option value="">All</option>
                        @foreach($signs as $s)
                            <option value="{{ $s }}" @selected(request('sign') === $s)>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                    <a class="btn btn-outline-secondary ms-2" href="{{ route('admin.daily-horoscopes.index') }}">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sign</th>
                        <th>Source</th>
                        <th>Override</th>
                        <th>Sections</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($entries as $e)
                        <tr>
                            <td>{{ $e->for_date?->format('Y-m-d') }}</td>
                            <td>{{ ucfirst($e->sign) }}</td>
                            <td class="text-secondary">{{ $e->source ?? '-' }}</td>
                            <td>
                                @if($e->admin_description)
                                    <span class="badge bg-green">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.horoscope-contents.index', ['period' => 'daily', 'sign' => $e->sign]) }}">Edit</a>
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.daily-horoscopes.edit', $e) }}">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-secondary">No entries found for this date. Run `php artisan horoscope:fetch-daily` first.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $entries->links() }}
        </div>
    </div>
@endsection
