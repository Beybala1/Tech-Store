@extends('layouts.backend')

@section('content')

@section('title')
<title>@lang('messages.service')</title>
@endsection

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.service')</h3>
    </div>
    <div class="card-body">
    <p class="text-center alert alert-warning fw-bold">@lang('messages.icon-class')</p>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
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
                    <label class="form-label" for="basic-default-icon">@lang('messages.icon')</label>
                    <input type="text" name="icon" value="{{ old('icon') }}"
                    class="form-control" id="basic-default-icon" placeholder="@lang('messages.icon')" required>
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
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                        <textarea name="description[{{ $language->code }}]" class="form-control" cols="20" rows="7" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                        <a href="{{ route('service.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
                    </div>
                </div>
                @endforeach

            </div>
        </form>
    </div>
</div>
@push('scripts')
<script>
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
</script>
@endpush

@endsection
