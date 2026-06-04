@extends('admin.layout')

@section('title', $role->exists ? 'Edit Role' : 'New Role')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $role->exists ? 'Edit Role' : 'New Role' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $role->exists ? route('admin.roles.update', $role) : route('admin.roles.store') }}">
                @csrf
                @if($role->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $role->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input class="form-control" name="slug" value="{{ old('slug', $role->slug) }}" placeholder="admin, editor, ..." {{ $role->exists ? 'required' : '' }}>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <input class="form-control" name="description" value="{{ old('description', $role->description) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Module Permissions</label>
                        <div class="text-secondary mb-2">Select which admin modules this role can access.</div>

                        @php($selected = collect(old('permission_ids', $role->exists ? $role->permissions->pluck('id')->all() : []))->map(fn($v) => (int) $v)->all())

                        <div class="row g-3">
                            @foreach($permissions as $group => $items)
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-header">
                                            <strong>{{ $group }}</strong>
                                        </div>
                                        <div class="card-body">
                                            @foreach($items as $p)
                                                <label class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permission_ids[]" value="{{ $p->id }}"
                                                        @checked(in_array($p->id, $selected, true) || $role->slug === 'admin')>
                                                    <span class="form-check-label">{{ $p->name }}</span>
                                                    <span class="form-check-description text-secondary">{{ $p->key }}</span>
                                                </label>
                                            @endforeach
                                            @if($role->slug === 'admin')
                                                <div class="form-hint mt-2">Admin role always has full access.</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
