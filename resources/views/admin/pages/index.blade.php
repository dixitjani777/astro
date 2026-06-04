@extends('admin.layout')

@section('title', 'CMS Pages')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">CMS Pages</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkPagesForm" class="d-inline" method="post" action="{{ route('admin.pages.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected pages?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>&nbsp;New Page
                </a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get">
                <div class="col-md-10">
                    <input class="form-control" name="q" placeholder="Search title/slug" value="{{ request('q') }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-primary w-100" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                <tr>
                    <th style="width: 30px;">
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkPagesForm">
                    </th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $page->id }}" data-bulk-check form="bulkPagesForm">
                        </td>
                        <td>{{ $page->title }}</td>
                        <td class="text-secondary">{{ $page->slug }}</td>
                        <td>
                            @if($page->is_published)
                                <span class="badge bg-green-lt">Published</span>
                            @else
                                <span class="badge bg-yellow-lt">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.pages.edit', $page) }}">Edit</a>
                                <form method="post" action="{{ route('admin.pages.destroy', $page) }}" onsubmit="return confirm('Delete this page?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if($pages instanceof \Illuminate\Contracts\Pagination\Paginator || $pages instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $pages->links() }}
            @endif
        </div>
    </div>
@endsection
