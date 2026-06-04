@extends('admin.layout')

@section('title', 'Roles')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Roles</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkRolesForm" class="d-inline" method="post" action="{{ route('admin.roles.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected roles?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>&nbsp;New Role
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
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkRolesForm">
                    </th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $role->id }}" data-bulk-check form="bulkRolesForm">
                        </td>
                        <td>{{ $role->name }}</td>
                        <td class="text-secondary">{{ $role->slug }}</td>
                        <td class="text-secondary">{{ $role->description }}</td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.roles.edit', $role) }}">Edit</a>
                                <form method="post" action="{{ route('admin.roles.destroy', $role) }}" onsubmit="return confirm('Delete this role?')">
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
            @if($roles instanceof \Illuminate\Contracts\Pagination\Paginator || $roles instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $roles->links() }}
            @endif
        </div>
    </div>
@endsection
