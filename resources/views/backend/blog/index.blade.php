@extends('layouts.backend')

@section('content')
@section('title')
    <title>@lang('messages.blog')</title>
@endsection
<div class="card">
    <h5 class="card-header">@lang('messages.blog')</h5>
    <div class="container">
        <form action="{{ route('blog.create') }}" method="get">
            <button class="btn btn-secondary create-new btn-primary mb-3" tabindex="0"><span><i
                        class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Əlavə
                        et</span></span></button>
        </form>
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>@lang('messages.image')</th>
                        <th>@lang('messages.author')</th>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.content')</th>
                        <th>@lang('messages.slug')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $i => $blog)
                        <tr>
                            <td>{{ $i += 1 }}</td>
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3">
                                            <span
                                                class="avatar-initial rounded-circle 
                                            bg-label-dark">
                                                <img src="{{ asset($blog->image) }}">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>
                            <td>{{ $blog->slug }}</td>
                            <td>{{ $blog->created_at }}</td>
                            <td>
                                <form action="{{ route('blog.destroy', [$blog->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group">
                                        <a href="{{ route('blog.show', [$blog->id]) }}" class="btn btn-success"
                                            title="İcazə ver">
                                            <i class="bi bi-person-gear"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" title="Sil">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
