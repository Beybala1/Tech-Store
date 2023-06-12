@extends('layouts.backend')

@section('content')
@section('title')
    <title>@lang('messages.users_and_roles')</title>
@endsection
<div class="card">
    <h5 class="card-header">@lang('messages.users_and_roles')</h5>
    <div class="container">
        <form action="{{ route('user-and-roles.create') }}" method="get">
            <button class="btn btn-secondary create-new btn-primary mb-3" tabindex="0"><span><i class="bx bx-plus me-sm-1"></i> 
                <span class="d-none d-sm-inline-block">@lang('messages.store')</button>
        </form>
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>@lang('messages.users')</th>
                        <th>@lang('messages.permissions')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i=>$user)
                    <tr>
                        <td>{{ $i+=1}}</td>
                        <td>
                            <div class="d-flex justify-content-left align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded-circle 
                                            bg-label-dark">
                                            <img src="{{ url($user->image) }}">
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-body text-truncate">
                                        <span class="fw-semibold">{{ $user->name }}</span>
                                    </a>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @foreach ($user->getRoleNames() as $role)
                                {{ $role.',' }}
                            @endforeach
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->email!=='admin@gmail.com')
                            <form action="{{ route('user-and-roles.destroy',[$user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('user-and-roles.show',[$user->id]) }}">
                                        <i class="bi bi-person-gear"></i>
                                        @lang('messages.givePermission')
                                    </a>
                                       <button class="dropdown-item del">
                                        <i class="bx bx-trash me-1"></i> 
                                        @lang('messages.delete')
                                    </button> 
                                    
                                  </div>
                                </div>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
