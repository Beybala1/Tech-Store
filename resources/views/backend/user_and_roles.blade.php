@extends('layouts.app')

@section('content')
@section('title')
<title>İstifadəçilər və icazələr</title>
@endsection
<div class="card">
    <h5 class="card-header">İstifadəçilər və icazələr</h5>
    <div class="container">
        <form action="{{ route('user-and-roles.create') }}" method="get">
            <button class="btn btn-secondary create-new btn-primary mb-3" tabindex="0"><span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Əlavə et</span></span></button>
        </form>
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>İstifadəçi</th>
                        <th>İcazə</th>
                        <th>Tarix</th>
                        <th>Əməliyyatlar</th>
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
                            test
                            {{--  @foreach ($user->getRoleNames() as $role)
                                {{ $role.',' }}
                            @endforeach --}}
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->email!=='admin@gmail.com')
                            <form action="{{ route('user-and-roles.destroy',[$user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <a href="{{ route('user-and-roles.show',[$user->id]) }}" class="btn btn-success"
                                        title="İcazə ver">
                                        <i class="bi bi-person-gear"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger" title="Sil">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
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
