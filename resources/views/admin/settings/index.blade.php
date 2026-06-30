@extends('admin.layout')

@section('title', 'Settings')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Settings</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.settings.site-controls') }}" class="btn btn-outline-primary me-2">
                    <i class="ti ti-shield-lock"></i>&nbsp;Site Controls
                </a>
                <form id="bulkSettingsForm" class="d-inline" method="post" action="{{ route('admin.settings.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected settings?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
                <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>&nbsp;New Setting
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
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkSettingsForm">
                    </th>
                    <th>Key</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th class="w-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($settings as $setting)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $setting->id }}" data-bulk-check form="bulkSettingsForm">
                        </td>
                        <td>{{ $setting->key }}</td>
                        <td class="text-secondary">{{ $setting->type }}</td>
                        <td class="text-secondary">{{ \Illuminate\Support\Str::limit($setting->value, 80) }}</td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.settings.edit', $setting) }}">Edit</a>
                                <form method="post" action="{{ route('admin.settings.destroy', $setting) }}" onsubmit="return confirm('Delete this setting?')">
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
            @if($settings instanceof \Illuminate\Contracts\Pagination\Paginator || $settings instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $settings->links() }}
            @endif
        </div>
    </div>
@endsection
