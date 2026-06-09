@extends('admin.layout')

@section('title', 'Users')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Users</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkUsersForm" class="d-inline" method="post" action="{{ route('admin.users.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected users?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>&nbsp;New User
                </a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get">
                <div class="col-6 col-md-2">
                    <input class="form-control" name="id" placeholder="ID" value="{{ request('id') }}">
                </div>
                <div class="col-12 col-md-3">
                    <input class="form-control" name="name" placeholder="Name" value="{{ request('name') }}">
                </div>
                <div class="col-12 col-md-3">
                    <input class="form-control" name="email" placeholder="Email" value="{{ request('email') }}">
                </div>
                <div class="col-12 col-md-2">
                    <select class="form-select" name="role">
                        <option value="">All roles</option>
                        @foreach($roles as $r)
                            <option value="{{ $r->slug }}" @selected(request('role')===$r->slug)>{{ $r->name }}</option>
                        @endforeach
                        <option value="user" @selected(request('role')==='user')>User</option>
                        <option value="admin" @selected(request('role')==='admin')>Admin</option>
                    </select>
                </div>
                <div class="col-6 col-md-1">
                    <input class="form-control" type="date" name="date_from" value="{{ request('date_from') }}">
                </div>
                <div class="col-6 col-md-1">
                    <input class="form-control" type="date" name="date_to" value="{{ request('date_to') }}">
                </div>
                <div class="col-12 d-flex gap-2">
                    <button class="btn btn-outline-primary" type="submit"><i class="ti ti-filter"></i>&nbsp;Filter</button>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Reset</a>
                    <a class="btn btn-success ms-auto" href="{{ route('admin.users.index', array_merge(request()->query(), ['export' => 'csv'])) }}">
                        <i class="ti ti-download"></i>&nbsp;Export CSV
                    </a>
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
                            <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkUsersForm">
                        </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $user->id }}" data-bulk-check form="bulkUsersForm">
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile ?: '-' }}</td>
                            <td><span class="badge bg-blue-lt">{{ $user->role }}</span></td>
                            <td class="text-secondary">{{ $user->created_at }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                                    <form method="post" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
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
            @if($users instanceof \Illuminate\Contracts\Pagination\Paginator || $users instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $users->links() }}
            @endif
        </div>
    </div>
@endsection
