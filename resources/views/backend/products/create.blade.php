@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.products')</title>
@endsection

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.products')</h3>
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
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
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
                <img id="imagePreview" src="#" alt="Image Preview"
                    style="display: none; max-width: 300px; max-height: 300px;">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                        id="imageInput" placeholder="@lang('messages.image')" required>
                </div>
                <div class="mb-3">
                    <label>@lang('messages.category') <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" required>
                        <option value="">@lang('messages.chooseCategory')</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>@lang('messages.alt-category') <span class="text-danger">*</span></label>
                    <select name="alt_category_id" class="form-control" required>
                        <option value="">@lang('messages.choose-alt-category')</option>
                        @foreach($altCategories as $altCategory)
                            <option value="{{ $altCategory->id }}">{{ $altCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>@lang('messages.alt-sub-category') <span class="text-danger">*</span></label>
                    <select name="alt_sub_category_id" class="form-control" required>
                        <option value="">@lang('messages.choose-alt-sub-category')</option>
                        @foreach($altSubCategories as $altSubCategory)
                            <option value="{{ $altSubCategory->id }}">{{ $altSubCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-price">@lang('messages.price')</label>
                    <input type="text" name="price" value="{{ old('title') }}"
                           class="form-control" id="basic-default-price" placeholder="@lang('messages.price')" required>
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
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-alt">@lang('messages.alt')</label>
                            <input type="text" name="alt[{{ $language->code }}]" value="{{ old('alt') }}"
                                class="form-control" id="basic-default-alt" placeholder="@lang('messages.alt')" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">@lang('messages.slug')</label>
                            <input type="text" name="slug[{{ $language->code }}]" value="{{ old('slug') }}"
                                class="form-control" id="basic-default-slug" placeholder="@lang('messages.slug')" required>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                            <a href="{{ route('products.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
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
