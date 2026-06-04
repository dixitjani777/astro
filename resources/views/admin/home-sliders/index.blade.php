@extends('admin.layout')

@section('title', 'Home Slider')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Home Slider</h2>
                <div class="text-secondary">Controls the main slider on the Home Page.</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.home-sliders.create') }}" class="btn btn-primary">New</a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get" action="{{ route('admin.home-sliders.index') }}">
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Title...">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                    <a class="btn btn-outline-secondary ms-2" href="{{ route('admin.home-sliders.index') }}">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($slides as $s)
                        <tr>
                            <td class="text-secondary">{{ $s->sort_order }}</td>
                            <td style="width: 120px;">
                                <img src="{{ asset($s->image_path) }}" class="rounded" style="width:100px;height:56px;object-fit:cover" alt="">
                            </td>
                            <td>{{ $s->title }}</td>
                            <td>
                                @if($s->is_active)
                                    <span class="badge bg-green">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.home-sliders.edit', $s) }}">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('admin.home-sliders.destroy', $s) }}" onsubmit="return confirm('Delete this slide?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-secondary">No slides found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $slides->links() }}
        </div>
    </div>
@endsection

