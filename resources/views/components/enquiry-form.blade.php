@props([
    'source' => null,
    'context' => null,
    'subject' => null,
    'layout' => 'stacked', // stacked|floating
    'inputClass' => 'form-control',
    'textareaClass' => 'form-control',
    'showName' => true,
    'showEmail' => true,
    'showPhone' => true,
    'showSubject' => false,
    'showMessage' => true,
    'messageLabel' => 'Message',
    'submitLabel' => 'Submit',
    'submitClass' => 'btn btn-primary',
    'showSubmit' => true,
    'consentLabel' => null,
    'meta' => [],
])

@php
    $metaPayload = is_array($meta) ? $meta : [];
@endphp

<form method="post" action="{{ route('enquiries.store') }}" {{ $attributes }}>
    @csrf

    <input type="hidden" name="source" value="{{ $source }}">
    <input type="hidden" name="context" value="{{ $context }}">
    <input type="hidden" name="subject" value="{{ $subject }}">
    <input type="hidden" name="page_url" value="{{ request()->fullUrl() }}">

    @foreach($metaPayload as $k => $v)
        <input type="hidden" name="meta[{{ $k }}]" value="{{ is_scalar($v) ? $v : json_encode($v) }}">
    @endforeach

    {{ $beforeFields ?? '' }}

    @if ($showName)
        @if($layout === 'floating')
            <div class="form-label-group mb-3">
                <input placeholder="Name" type="text" class="{{ $inputClass }}" name="name" value="{{ old('name') }}">
                <label>Name</label>
                @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
        @else
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="{{ $inputClass }}" type="text" name="name" value="{{ old('name') }}">
                @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
        @endif
    @endif

    @if ($showEmail)
        @if($layout === 'floating')
            <div class="form-label-group mb-3">
                <input placeholder="Email" type="email" class="{{ $inputClass }}" name="email" value="{{ old('email') }}">
                <label>Email</label>
                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
        @else
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="{{ $inputClass }}" type="email" name="email" value="{{ old('email') }}">
                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
        @endif
    @endif

    @if ($showPhone)
        @if($layout === 'floating')
            <div class="form-label-group mb-3">
                <input placeholder="Phone" type="text" class="{{ $inputClass }}" name="phone" value="{{ old('phone') }}">
                <label>Phone</label>
                @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
        @else
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input class="{{ $inputClass }}" type="text" name="phone" value="{{ old('phone') }}">
                @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
        @endif
    @endif

    @if ($showSubject)
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input class="{{ $inputClass }}" type="text" name="subject" value="{{ old('subject', $subject) }}">
            @error('subject')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
    @endif

    @if ($showMessage)
        @if($layout === 'floating')
            <div class="form-label-group mb-4">
                <textarea placeholder="{{ $messageLabel }}" class="{{ $textareaClass }}" name="message" rows="3">{{ old('message') }}</textarea>
                <label>{{ $messageLabel }}</label>
                @error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
        @else
            <div class="mb-3">
                <label class="form-label">{{ $messageLabel }}</label>
                <textarea class="{{ $textareaClass }}" name="message" rows="4">{{ old('message') }}</textarea>
                @error('message')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
        @endif
    @endif

    {{ $slot }}

    @if($consentLabel)
        <div class="clearfix bg-light position-relative rounded p-4 mb-4">
            <label class="form-checkbox form-checkbox-primary mb-0">
                <input required type="checkbox" name="meta[consent]" value="1">
                <i></i>
                <span>{!! $consentLabel !!}</span>
            </label>
        </div>
    @endif

    @if($showSubmit)
        <button type="submit" class="{{ $submitClass }}">{{ $submitLabel }}</button>
    @endif

    {{ $afterSubmit ?? '' }}

    @if (session('status'))
        <div class="mt-2 text-success small">{{ session('status') }}</div>
    @endif
</form>
