@extends('admin.layout')

@section('title', 'Offers')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="page-title mb-0">Offers</h2>
            <div class="text-secondary">Manage offer slider images</div>
        </div>
        <div class="d-flex gap-2">
            <form id="bulkOffersForm" class="m-0" method="post" action="{{ route('admin.offers.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected offers?')">
                @csrf
                <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                    <i class="ti ti-trash"></i>&nbsp;Delete selected
                </button>
            </form>
            <a class="btn btn-primary" href="{{ route('admin.offers.create') }}">
                <i class="ti ti-plus"></i>&nbsp;New Offer
            </a>
        </div>
    </div>

    <form method="get" class="mb-3">
        <div class="row g-2">
            <div class="col-md-6">
                <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Search title or URL...">
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
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkOffersForm">
                    </th>
                    <th style="width: 80px;">Image</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Active</th>
                    <th>Order</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($offers as $offer)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $offer->id }}" data-bulk-check form="bulkOffersForm">
                        </td>
                        <td>
                            <img src="{{ asset($offer->image_path) }}" class="rounded" style="width:64px;height:64px;object-fit:cover" alt="">
                        </td>
                        <td>{{ $offer->title ?: '—' }}</td>
                        <td class="text-secondary">
                            @if ($offer->link_url)
                                <a href="{{ $offer->link_url }}" target="_blank" rel="noopener">{{ \Illuminate\Support\Str::limit($offer->link_url, 60) }}</a>
                            @else
                                —
                            @endif
                        </td>
                        <td>{!! $offer->is_active ? '<span class="badge bg-green-lt">Yes</span>' : '<span class="badge bg-red-lt">No</span>' !!}</td>
                        <td class="text-secondary">{{ $offer->sort_order }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.offers.edit', $offer) }}">
                                <i class="ti ti-edit"></i>&nbsp;Edit
                            </a>
                            <form class="d-inline" method="post" action="{{ route('admin.offers.destroy', $offer) }}" onsubmit="return confirm('Delete this offer?')">
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
                        <td colspan="7" class="text-center text-secondary py-5">No offers found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if($offers instanceof \Illuminate\Contracts\Pagination\Paginator || $offers instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $offers->links() }}
            @endif
        </div>
    </div>
@endsection
