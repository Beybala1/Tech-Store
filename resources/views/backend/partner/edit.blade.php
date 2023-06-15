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
        <form action="{{ route('partner.update', $partner->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body" style="margin-right:52%;">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="rounded me-2" alt="200x200" width="200" id="test"
                            src="{{ asset($partner->image) }}" data-holder-rendered="true">
                        </div>
                    </div>
                </div>
            </div>
            <div id="imageContainer"></div>
            {{-- Form --}}
            <div class="mb-3">
                <label class="form-label" for="basic-default-image">@lang('messages.image')</label>
                <input type="file" name="image" value="{{ $partner->image }}" class="form-control"
                id="imageInput" placeholder="@lang('messages.image')" >
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-link">@lang('messages.link')</label>
                <input type="text" name="link" class="form-control" value="{{ $partner->link }}"
                id="basic-default-link" placeholder="@lang('messages.link')">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-alt">@lang('messages.alt')</label>
                <input type="text" name="alt" class="form-control"
                value="{{ $partner->alt }}" id="basic-default-alt"
                placeholder="@lang('messages.alt')">
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
