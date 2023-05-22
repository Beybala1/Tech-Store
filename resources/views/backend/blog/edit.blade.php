@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.blog')</title>
@endsection

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
        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                @foreach (config('app.locales') as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === app()->getLocale() ? 'active' : '' }}"
                            id="pills-{{ $key }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $key }}" type="button" role="tab"
                            aria-controls="pills-{{ $key }}"
                            aria-selected="{{ $key === app()->getLocale() ? 'true' : 'false' }}">
                            {{ $lang }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <img width="100%" height="300px" src="{{ asset($blog->image) }}" id="test" alt="">
                <div id="imageContainer"></div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                    <input type="file" name="image" class="form-control" value="{{ $blog->image }}"
                        id="imageInput" placeholder="@lang('messages.image')">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-author">@lang('messages.author')</label>
                    <input type="text" name="author" class="form-control" value="{{ $blog->author }}"
                        id="basic-default-author" placeholder="@lang('messages.author')" required>
                </div>
                @foreach (config('app.locales') as $key => $lang)
                    <div class="tab-pane fade {{ $key === app()->getLocale() ? 'show active' : '' }}"
                        id="pills-{{ $key }}" role="tabpanel"
                        aria-labelledby="pills-{{ $key }}-tab">
                        {{-- Form --}}
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">@lang('messages.title')</label>
                            <input type="text" name="title[{{ $key }}]" class="form-control"
                                value="{{ $blog->translate($key)->title }}" id="basic-default-title"
                                placeholder="@lang('messages.title')" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                            <textarea name="content[{{ $key }}]" class="form-control" cols="10" rows="5">{{ $blog->translate($key)->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">@lang('messages.slug')</label>
                            <input type="text" name="slug[{{ $key }}]" class="form-control"
                                value="{{ $blog->translate($key)->slug }}" id="basic-default-slug"
                                placeholder="@lang('messages.slug')" required>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
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
        const imageContainer = document.getElementById('imageContainer');
        let previousImage = null; 
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById("test").style.display = "none";
                    if (previousImage) {

                        imageContainer.removeChild(previousImage);
                    }
                    const image = document.createElement('img');
                    image.src = reader.result;
                    previousImage = image; // Set the current image as the previous image
                    imageContainer.appendChild(image);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
@endsection
