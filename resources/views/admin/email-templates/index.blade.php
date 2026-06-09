@extends('admin.layout')

@section('title', 'Email Templates')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Email Templates</h2>
                <div class="text-secondary">Manage OTP, enquiry, and registration email bodies from one place.</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->name }}</td>
                            <td><code>{{ $template->slug }}</code></td>
                            <td>{{ $template->subject ?: '-' }}</td>
                            <td>
                                @if($template->is_active)
                                    <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle">Active</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.email-templates.edit', $template) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
