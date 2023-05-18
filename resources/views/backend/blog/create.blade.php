@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.blog')</title>
@endsection

<div class="card">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">@lang('messages.blog') @lang('messages.create')</h3>
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
            <form action="{{ route('blog.store') }}" method="post">
                @csrf

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Home</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        ...z
                    </div>
                </div>



                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                        id="basic-default-image" placeholder="@lang('messages.image')" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-author">@lang('messages.author')</label>
                    <input type="text" name="author" value="{{ old('author') }}" class="form-control"
                        id="basic-default-author" placeholder="@lang('messages.author')" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-title">@lang('messages.title')</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                        id="basic-default-title" placeholder="@lang('messages.title')" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                    <textarea name="content" class="form-control" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-slug">@lang('messages.slug')</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                        id="basic-default-slug" placeholder="@lang('messages.slug')" required>
                </div>
                <div class="pt-2">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                    <a href="{{ route('blog.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
