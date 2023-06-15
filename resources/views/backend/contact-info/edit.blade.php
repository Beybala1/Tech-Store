@extends('layouts.backend')

@section('content')

@section('title')
<title>@lang('messages.contact-info')</title>
@endsection

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.contact-info')</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('contact-info.update', $contactInfo->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                <textarea name="content" class="form-control" cols="20" rows="7" required>{{ $contactInfo->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
            <a href="{{ route('contact-info.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
        </form>
    </div>
</div>

@endsection
