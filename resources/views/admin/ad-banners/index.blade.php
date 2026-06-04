@extends('admin.layout')

@section('title', 'Ad Banners')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="page-title mb-0">Ad Banners</h2>
            <div class="text-secondary">Manage sponsored/advertise banners</div>
        </div>
        <div class="d-flex gap-2">
            <form id="bulkAdBannersForm" class="m-0" method="post" action="{{ route('admin.ad-banners.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected banners?')">
                @csrf
                <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                    <i class="ti ti-trash"></i>&nbsp;Delete selected
                </button>
            </form>
            <a class="btn btn-primary" href="{{ route('admin.ad-banners.create') }}">
                <i class="ti ti-plus"></i>&nbsp;New Banner
            </a>
        </div>
    </div>

    <form method="get" class="mb-3">
        <div class="row g-2">
            <div class="col-md-6">
                <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Search title / placement / URL...">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-secondary w-100" type="submit">
                    <i class="ti ti-search"></i>&nbsp;Search
                </button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                <tr>
                    <th style="width: 30px;">
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkAdBannersForm">
                    </th>
                    <th style="width: 80px;">Image</th>
                    <th>Title</th>
                    <th>Placement</th>
                    <th>Type</th>
                    <th>Link</th>
                    <th>Active</th>
                    <th>Order</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($banners as $banner)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $banner->id }}" data-bulk-check form="bulkAdBannersForm">
                        </td>
                        <td>
                            @if(($banner->content_type ?? 'image') === 'image' && $banner->image_path)
                                <img src="{{ asset($banner->image_path) }}" class="rounded" style="width:64px;height:64px;object-fit:cover" alt="">
                            @else
                                <span class="text-secondary">—</span>
                            @endif
                        </td>
                        <td>{{ $banner->title ?: '—' }}</td>
                        <td class="text-secondary">{{ $banner->placement }}</td>
                        <td class="text-secondary">{{ $banner->content_type ?? 'image' }}</td>
                        <td class="text-secondary">
                            @if ($banner->link_url)
                                <a href="{{ $banner->link_url }}" target="_blank" rel="noopener">{{ \Illuminate\Support\Str::limit($banner->link_url, 60) }}</a>
                            @else
                                —
                            @endif
                        </td>
                        <td>{!! $banner->is_active ? '<span class="badge bg-green-lt">Yes</span>' : '<span class="badge bg-red-lt">No</span>' !!}</td>
                        <td class="text-secondary">{{ $banner->sort_order }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.ad-banners.edit', $banner) }}">
                                <i class="ti ti-edit"></i>&nbsp;Edit
                            </a>
                            <form class="d-inline" method="post" action="{{ route('admin.ad-banners.destroy', $banner) }}" onsubmit="return confirm('Delete this banner?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger" type="submit">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-secondary py-5">No banners found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if($banners instanceof \Illuminate\Contracts\Pagination\Paginator || $banners instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $banners->links() }}
            @endif
        </div>
    </div>
@endsection
