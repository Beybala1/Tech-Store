@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.user')</title>
@endsection

<div class="card">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">@lang('messages.user') @lang('messages.create')</h3> 
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
            <form action="{{ route('user-and-roles.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">@lang('messages.userName')</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" 
                    id="basic-default-fullname" placeholder="@lang('messages.userName')" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-email">@lang('messages.email')</label>
                    <div class="input-group input-group-merge">
                        <input type="email" name="email" value="{{ old('email') }}" id="basic-default-email" class="form-control" placeholder="@lang('messages.email')"
                            aria-label="@lang('messages.email')" aria-describedby="basic-default-email2">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">@lang('messages.password')</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="............" required>
                </div>  
                <div class="mb-3">
                    <label class="form-label" for="password">@lang('messages.confirmPassword')</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="............." required>
                </div>
                <div class="pt-2">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('messages.store')</button>
                    <a href="{{ route('user-and-roles.index') }}" class="btn btn-label-secondary">@lang('messages.cancel')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
