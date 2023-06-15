@extends('layouts.backend')

@section('content')

@section('title')
<title>@lang('messages.statistic')</title>
@endsection

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.statistic')</h3>
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
        <form action="{{ route('statistic.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                @foreach (lang() as $language)
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $language->code === app()->getLocale() ? 'active' : '' }}"
                        id="pills-{{ $language->code }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ $language->code }}" type="button" role="tab"
                        aria-controls="pills-{{ $language->code }}"
                        aria-selected="{{ $language->code === app()->getLocale() ? 'true' : 'false' }}">
                        {{ $language->name }}
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-number">@lang('messages.number')</label>
                    <input type="number" name="number" value="{{ old('number') }}"
                    class="form-control" id="basic-default-number" placeholder="@lang('messages.number')" required>
                </div>
                @foreach (lang() as $language)
                <div class="tab-pane fade {{ $language->code === app()->getLocale() ? 'show active' : '' }}"
                    id="pills-{{ $language->code }}" role="tabpanel"
                    aria-labelledby="pills-{{ $language->code }}-tab">
                    {{-- Form --}}
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-title">@lang('messages.title')</label>
                        <input type="text" name="title[{{ $language->code }}]" value="{{ old('title') }}"
                        class="form-control" id="basic-default-title" placeholder="@lang('messages.title')" required>
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                        <a href="{{ route('statistic.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
                    </div>
                </div>
                @endforeach

            </div>
        </form>
    </div>
</div>

@endsection
