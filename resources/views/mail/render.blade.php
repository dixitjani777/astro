@extends('mail.layouts.brand', ['subject' => $subject ?? config('app.name'), 'heading' => $heading ?? ($subject ?? config('app.name'))])

@section('content')
    {!! $bodyHtml ?? '' !!}
@endsection
