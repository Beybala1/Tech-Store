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
                <div class="card">
                    <div class="card-body" style="margin-right:52%;">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="rounded me-2" alt="200x200" width="200" id="test"
                                    src="{{ asset($blog->image) }}" data-holder-rendered="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="imageContainer"></div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                    <input type="file" name="image" class="form-control" value="{{ $blog->image }}"
                        id="imageInput" placeholder="@lang('messages.image')">
                </div>
                @foreach (lang() as $language)
                    <div class="tab-pane fade {{ $language->code === app()->getLocale() ? 'show active' : '' }}"
                        id="pills-{{ $language->code }}" role="tabpanel"
                        aria-labelledby="pills-{{ $language->code }}-tab">
                        {{-- Form --}}
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">@lang('messages.title')</label>
                            <input type="text" name="title[{{ $language->code }}]" class="form-control"
                                value="{{ $blog->translate($language->code)->title }}" id="basic-default-title"
                                placeholder="@lang('messages.title')" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                            <textarea name="description[{{ $language->code }}]" class="form-control" cols="20" rows="7" required>{{ $blog->translate($language->code)->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-alt">@lang('messages.alt')</label>
                            <input type="text" name="alt[{{ $language->code }}]" class="form-control"
                                value="{{ $blog->translate($language->code)->alt }}" id="basic-default-alt"
                                placeholder="@lang('messages.alt')" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">@lang('messages.slug')</label>
                            <input type="text" name="slug[{{ $language->code }}]" class="form-control"
                                value="{{ $blog->translate($language->code)->slug }}" id="basic-default-slug"
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
