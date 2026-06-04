@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Dashboard</h2>
            </div>
        </div>
    </div>

    <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Enquiries Today</div>
                    </div>
                    <div class="h1 mb-3">{{ $enquiriesToday }}</div>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.enquiries.index') }}">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Enquiries Total</div>
                    <div class="h1 mb-3">{{ $enquiriesTotal }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Users</div>
                    <div class="h1 mb-3">{{ $usersTotal }}</div>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.users.index') }}">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">CMS Pages</div>
                    <div class="h1 mb-3">{{ $pagesTotal }}</div>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.pages.index') }}">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Blog Posts</div>
                    <div class="h1 mb-3">{{ $postsTotal }}</div>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.blog.posts.index') }}">Manage</a>
                </div>
            </div>
        </div>
    </div>
@endsection
