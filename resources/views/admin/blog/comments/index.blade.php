@extends('admin.layout')

@section('title', 'Blog Comments')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Blog Comments</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkCommentsForm" class="m-0" method="post" action="{{ route('admin.blog.comments.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected comments?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get">
                <div class="col-md-4">
                    <select class="form-select" name="approved">
                        <option value="">All</option>
                        <option value="1" @selected(request('approved')==='1')>Approved</option>
                        <option value="0" @selected(request('approved')==='0')>Pending</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-primary w-100" type="submit">Filter</button>
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
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkCommentsForm">
                    </th>
                    <th>Post</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $comment->id }}" data-bulk-check form="bulkCommentsForm">
                        </td>
                        <td class="text-secondary">{{ $comment->post?->title }}</td>
                        <td>{{ $comment->name }}</td>
                        <td class="text-secondary">{{ $comment->email }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($comment->comment, 80) }}</td>
                        <td>
                            @if($comment->is_approved)
                                <span class="badge bg-green-lt">Approved</span>
                            @else
                                <span class="badge bg-yellow-lt">Pending</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                @if(!$comment->is_approved)
                                    <form method="post" action="{{ route('admin.blog.comments.approve', $comment) }}">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-primary" type="submit">Approve</button>
                                    </form>
                                @endif
                                <form method="post" action="{{ route('admin.blog.comments.destroy', $comment) }}" onsubmit="return confirm('Delete this comment?')">
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
            @if($comments instanceof \Illuminate\Contracts\Pagination\Paginator || $comments instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $comments->links() }}
            @endif
        </div>
    </div>
@endsection
