@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.myProfile')</title>
@endsection

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">@lang('messages.myProfile') /</span> {{ auth()->user()->name }}
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <!-- Account -->
            <hr class="my-0">
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
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="formAccountSettings">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset(auth()->user()->image) }}" 
                                alt="user-avatar" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">@lang('messages.upload')</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="image" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="user_name" class="form-label">@lang('messages.userName')</label>
                            <input name="user_name" value="{{ auth()->user()->name }}" class="form-control" 
                                type="text" id="user_name" placeholder="@lang('messages.userName')"
                                autofocus required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">@lang('messages.email')</label>
                            <input name="email" value="{{ auth()->user()->email }}"  class="form-control" type="text" 
                                id="email"  placeholder="@lang('messages.email')" required/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="current_password" class="form-label">@lang('messages.myPassword')</label>
                            <input name="current_password" class="form-control" type="password"
                                id="current_password" placeholder="............"
                                required/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">@lang('messages.newPassword')</label>
                            <input name="password" class="form-control" type="password" 
                                id="password" placeholder="............" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">@lang('messages.confirmPassword')</label>
                            <input name="password_confirmation" class="form-control" 
                                type="password" id="password_confirmation" 
                                placeholder="............" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">@lang('messages.save')</button>
                        <a href="{{ route('dashboard.index') }}" 
                            class="btn btn-label-secondary">
                            @lang('messages.cancel')
                        </a>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>

@endsection
