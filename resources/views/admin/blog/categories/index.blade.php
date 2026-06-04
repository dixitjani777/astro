@extends('admin.layout')

@section('title', 'Blog Categories')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Blog Categories</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkBlogCategoriesForm" class="d-inline" method="post" action="{{ route('admin.blog.categories.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected categories?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
                <a href="{{ route('admin.blog.categories.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>&nbsp;New Category
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                <tr>
                    <th style="width: 30px;">
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkBlogCategoriesForm">
                    </th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $category->id }}" data-bulk-check form="bulkBlogCategoriesForm">
                        </td>
                        <td>{{ $category->name }}</td>
                        <td class="text-secondary">{{ $category->slug }}</td>
                        <td class="text-secondary">{{ $category->description }}</td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.blog.categories.edit', $category) }}">Edit</a>
                                <form method="post" action="{{ route('admin.blog.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?')">
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
            @if($categories instanceof \Illuminate\Contracts\Pagination\Paginator || $categories instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $categories->links() }}
            @endif
        </div>
    </div>
@endsection
