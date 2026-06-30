@extends('admin.layout')

@section('title', $template->exists ? 'Edit WhatsApp Template' : 'New WhatsApp Template')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $template->exists ? 'Edit WhatsApp Template' : 'New WhatsApp Template' }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.whatsapp-templates.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ $template->exists ? route('admin.whatsapp-templates.update', $template) : route('admin.whatsapp-templates.store') }}">
                @csrf
                @if($template->exists) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $template->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input class="form-control" name="slug" value="{{ old('slug', $template->slug) }}" required>
                        <div class="form-hint mt-1">Keep this as <code>astro_otp</code> for OTP delivery through the BW API.</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Body Text</label>
                        <textarea class="form-control" rows="10" name="body_text" placeholder="Use tokens like @{{code}}, @{{name}}, @{{login_url}}">{{ old('body_text', $template->body_text) }}</textarea>
                        <div class="form-hint mt-1">Available tokens: <code>@{{code}}</code>, <code>@{{name}}</code>, <code>@{{email}}</code>, <code>@{{mobile}}</code>, <code>@{{subject}}</code>, <code>@{{message}}</code>, <code>@{{reply_body}}</code>, <code>@{{attachment_url}}</code>, <code>@{{payment_url}}</code>, <code>@{{login_url}}</code>.</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $template->is_active ?? true))>
                            <label class="form-check-label">Active</label>
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
