@extends('layouts.backend')

@section('content')

@section('title')
<title>@lang('messages.partner')</title>
@endsection

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">@lang('messages.partner')</h3>
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
        <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <img id="imagePreview" src="#" alt="Image Preview"
            style="display: none; max-width: 300px; max-height: 300px;">
            {{-- Form --}}
            <div class="mb-3">
                <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                id="imageInput" placeholder="@lang('messages.image')" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-link">@lang('messages.link')</label>
                <input type="text" name="link" value="{{ old('link') }}"
                class="form-control" id="basic-default-link" placeholder="@lang('messages.link')">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-alt">@lang('messages.alt')</label>
                <input type="text" name="alt" value="{{ old('alt') }}"
                class="form-control" id="basic-default-alt" placeholder="@lang('messages.alt')">
            </div>
            <div class="pt-2">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                <a href="{{ route('partner.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
            </div>
        </div>
    </form>
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
