@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.products')</title>
@endsection

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.products') @lang('messages.editData')</h3>
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
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
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
                                    src="{{ asset($product->image) }}" data-holder-rendered="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="imageContainer"></div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                    <input type="file" name="image" class="form-control" value="{{ $product->image }}"
                        id="imageInput" placeholder="@lang('messages.image')">
                </div>
                <div class="mb-3">
                    <label>@lang('messages.category') <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" required>
                        <option value="">@lang('messages.chooseCategory')</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id==$product->category_id ? 'selected' : '' }}>
                                {{ $category->title }}
                           </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>@lang('messages.alt-category') <span class="text-danger">*</span></label>
                    <select name="alt_category_id" class="form-control" required>
                        <option value="">@lang('messages.choose-alt-category')</option>
                        @foreach($altCategories as $altCategory)
                            <option value="{{ $altCategory->id }}" {{ $altCategory->id==$product->category_id ? 'selected' : '' }}>{{ $altCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>@lang('messages.alt-sub-category') <span class="text-danger">*</span></label>
                    <select name="alt_sub_category_id" class="form-control" required>
                        <option value="">@lang('messages.choose-alt-sub-category')</option>
                        @foreach($altSubCategories as $altSubCategory)
                            <option value="{{ $altSubCategory->id }}" {{ $altSubCategory->id==$product->alt_sub_category_id ? 'selected' : '' }}>{{ $altSubCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-price">@lang('messages.price')</label>
                    <input type="text" name="price" value="{{ $product->price }}"
                           class="form-control" id="basic-default-price" placeholder="@lang('messages.price')" required>
                </div>
                @foreach (lang() as $language)
                    <div class="tab-pane fade {{ $language->code === app()->getLocale() ? 'show active' : '' }}"
                        id="pills-{{ $language->code }}" role="tabpanel"
                        aria-labelledby="pills-{{ $language->code }}-tab">
                        {{-- Form --}}
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">@lang('messages.title')</label>
                            <input type="text" name="title[{{ $language->code }}]" class="form-control"
                                value="{{ $product->translate($language->code)->title }}" id="basic-default-title"
                                placeholder="@lang('messages.title')" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-content">@lang('messages.content')</label>
                            <textarea name="description[{{ $language->code }}]" class="form-control" cols="20" rows="7" required>{{ $product->translate($language->code)->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-alt">@lang('messages.alt')</label>
                            <input type="text" name="alt[{{ $language->code }}]" class="form-control"
                                value="{{ $product->translate($language->code)->alt }}" id="basic-default-alt"
                                placeholder="@lang('messages.alt')">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">@lang('messages.slug')</label>
                            <input type="text" name="slug[{{ $language->code }}]" class="form-control"
                                value="{{ $product->translate($language->code)->slug }}" id="basic-default-slug"
                                placeholder="@lang('messages.slug')" required>
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
