@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.language')</title>
@endsection

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.language') </h3>
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
        <form action="{{ route('language.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-name">@lang('messages.name')</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                    id="basic-default-name" placeholder="@lang('messages.name')" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-code">@lang('messages.code')</label>                    
                <input type="text" name="code" value="{{ old('code') }}" class="form-control"
                    id="basic-default-code" placeholder="@lang('messages.code')" required>
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
            <a href="{{ route('language.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
        </form>
    </div>
</div>

@endsection
