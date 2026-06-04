@extends('admin.layout')

@section('title', 'Blog Posts')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Blog Posts</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkBlogPostsForm" class="d-inline" method="post" action="{{ route('admin.blog.posts.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected posts?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
                <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>&nbsp;New Post
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
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkBlogPostsForm">
                    </th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $post->id }}" data-bulk-check form="bulkBlogPostsForm">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td class="text-secondary">{{ $post->category?->name }}</td>
                        <td>
                            @if($post->is_published)
                                <span class="badge bg-green-lt">Published</span>
                            @else
                                <span class="badge bg-yellow-lt">Draft</span>
                            @endif
                        </td>
                        <td class="text-secondary">{{ $post->published_at }}</td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.blog.posts.edit', $post) }}">Edit</a>
                                <form method="post" action="{{ route('admin.blog.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
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
            @if($posts instanceof \Illuminate\Contracts\Pagination\Paginator || $posts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $posts->links() }}
            @endif
        </div>
    </div>
@endsection
