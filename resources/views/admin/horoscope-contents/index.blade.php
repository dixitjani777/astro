@extends('admin.layout')

@section('title', 'Horoscope Content')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Horoscope Content</h2>
                <div class="text-secondary">Manage editable (static) sections for horoscope pages.</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.horoscope-contents.create') }}" class="btn btn-primary">New</a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get" action="{{ route('admin.horoscope-contents.index') }}">
                <div class="col-md-3">
                    <label class="form-label">Period</label>
                    <select class="form-select" name="period">
                        <option value="">All</option>
                        @foreach($periods as $p)
                            <option value="{{ $p }}" @selected(request('period') === $p)>{{ ucfirst($p) }}</option>
                        @endforeach
                    </select>
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
                    <a class="btn btn-outline-secondary ms-2" href="{{ route('admin.horoscope-contents.index') }}">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Period</th>
                        <th>Sign</th>
                        <th>Status</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contents as $c)
                        <tr>
                            <td>{{ ucfirst($c->period) }}</td>
                            <td>{{ ucfirst($c->sign) }}</td>
                            <td>
                                @if($c->is_active)
                                    <span class="badge bg-green">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.horoscope-contents.edit', $c) }}">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('admin.horoscope-contents.destroy', $c) }}" onsubmit="return confirm('Delete this entry?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-secondary">No entries yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $contents->links() }}
        </div>
    </div>
@endsection

