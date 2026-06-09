@extends('admin.layout')

@section('title', $user->exists ? 'Edit User' : 'New User')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $user->exists ? 'Edit User' : 'New User' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}">
                @csrf
                @if($user->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile / WhatsApp</label>
                        <input class="form-control" type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="+91 9876543210">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            @php($roleValue = old('role', $user->role ?: 'user'))
                            <option value="user" @selected($roleValue==='user')>User</option>
                            @foreach($roles as $r)
                                <option value="{{ $r->slug }}" @selected($roleValue===$r->slug)>{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password {{ $user->exists ? '(leave blank to keep)' : '' }}</label>
                        <input class="form-control" type="password" name="password" {{ $user->exists ? '' : 'required' }}>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
