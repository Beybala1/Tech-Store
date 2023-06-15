@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.message')</title>
@endsection

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.message')</h3>
    </div>
    <div class="card-body">
        <p><span class="fw-bold">@lang('messages.name'):</span> {{ $message->name }}</p>
        <p><span class="fw-bold">@lang('messages.email'):</span> {{ $message->email }}</p>
        <p><span class="fw-bold">@lang('messages.phone'):</span> {{ $message->phone }}</p>
        <p><span class="fw-bold">@lang('messages.subject'):</span> {{ $message->subject }}</p>
        <p><span class="fw-bold">@lang('messages.message'):</span> {{ $message->message }}</p>
        <form action="mailto:{{ $message->email }}">
            <button class="btn btn-primary">@lang('messages.answer')</button>
            <a href="{{ route('message.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
        </form>
    </div>
</div>

@endsection
