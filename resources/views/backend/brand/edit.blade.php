@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.brand')</title>
@endsection

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.brand')</h3>
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
        <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="basic-default-title">@lang('messages.brand')</label>
                    <input type="text" name="title" value="{{ $brand->title }}" class="form-control"
                    id="basic-default-title" placeholder="@lang('messages.brand')" required>
                </div>
                <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                <a href="{{ route('brand.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
        </form>
    </div>
</div>

@endsection
