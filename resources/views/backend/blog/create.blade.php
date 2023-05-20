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
        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
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
            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 300px; max-height: 300px;">
            <div class="tab-content" id="pills-tabContent">
                <input type="file" id="imageInput">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                        id="imageInput" placeholder="@lang('messages.image')" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-author">@lang('messages.author')</label>
                    <input type="text" name="author" value="{{ old('author') }}" class="form-control"
                        id="basic-default-author" placeholder="@lang('messages.author')" required>
                </div>
                @foreach (config('app.locales') as $key => $lang)
                    <div class="tab-pane fade {{ $key === app()->getLocale() ? 'show active' : '' }}"
                        id="pills-{{ $key }}" role="tabpanel" aria-labelledby="pills-{{ $key }}-tab">
                        {{-- Form --}}
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">@lang('messages.title')</label>
                            <input type="text" name="title[{{ $key }}]" value="{{ old('title') }}" class="form-control"
                                id="basic-default-title" placeholder="@lang('messages.title')" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                            <textarea name="content[{{ $key }}]" class="form-control" cols="20" rows="7">
                                {{ old('content') }}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">@lang('messages.slug')</label>
                            <input type="text" name="slug[{{ $key }}]" value="{{ old('slug') }}" class="form-control"
                                id="basic-default-slug" placeholder="@lang('messages.slug')" required>
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
<script>
    // Get references to the input and image elements
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');

// Add an event listener to the input for the image selection
imageInput.addEventListener('change', function(event) {
  const file = event.target.files[0];

  // Ensure the file is an image
  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();

    // Set up the FileReader onload event
    reader.onload = function() {
      // Set the image source to the FileReader result
      imagePreview.src = reader.result;
      imagePreview.style.display = 'block';
    };

    // Read the file as a data URL
    reader.readAsDataURL(file);
  } else {
    // Clear the image preview if the file is not an image
    imagePreview.src = '#';
    imagePreview.style.display = 'none';
  }
});

</script>
@endsection
