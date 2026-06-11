@extends('admin.layout')

@section('title', 'WhatsApp Templates')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">WhatsApp Templates</h2>
                <div class="text-secondary">Manage OTP and enquiry reply text templates.</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a class="btn btn-primary" href="{{ route('admin.whatsapp-templates.create') }}">New Template</a>
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
                        <th>Status</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($templates as $template)
                        <tr>
                            <td>{{ $template->name }}</td>
                            <td><code>{{ $template->slug }}</code></td>
                            <td>
                                @if($template->is_active)
                                    <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle">Active</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-list justify-content-end">
                                    <a href="{{ route('admin.whatsapp-templates.edit', $template) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form method="post" action="{{ route('admin.whatsapp-templates.destroy', $template) }}" onsubmit="return confirm('Delete this template?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-secondary">No templates found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
