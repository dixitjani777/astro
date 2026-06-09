@extends('admin.layout')

@section('title', 'Edit Email Template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/vendor.summernoteeditor.css') }}">
@endpush

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Email Template</h2>
                <div class="text-secondary">{{ $template->name }} - <code>{{ $template->slug }}</code></div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.email-templates.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.email-templates.update', $template) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Template Name</label>
                        <input class="form-control" value="{{ $template->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input class="form-control" value="{{ $template->slug }}" readonly>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Subject</label>
                        <input class="form-control" name="subject" value="{{ old('subject', $template->subject) }}" placeholder="Email subject">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $template->is_active))>
                            <span class="form-check-label">Active</span>
                        </label>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Body HTML</label>
                        <div class="text-secondary mb-2">
                            Use the editor to add or update content. Tokens you can use:
                            <code>@{{code}}</code>,
                            <code>@{{name}}</code>,
                            <code>@{{email}}</code>,
                            <code>@{{mobile}}</code>,
                            <code>@{{subject}}</code>,
                            <code>@{{message}}</code>,
                            <code>@{{login_url}}</code>,
                            <code>@{{enquiry_details}}</code>.
                        </div>
                        <textarea class="form-control summernote-editor" name="body_html" rows="16">{{ old('body_html', $template->body_html) }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor.summernoteeditor.js') }}"></script>
    <script>
        $(function () {
            $('.summernote-editor').summernote({
                height: 320,
                dialogsInBody: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'table', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush
