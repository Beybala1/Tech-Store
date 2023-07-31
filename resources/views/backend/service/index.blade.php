@extends('layouts.backend')

@section('content')
@section('title')
    <title>@lang('messages.service')</title>
@endsection
<div class="card">
    <h5 class="card-header">@lang('messages.service')</h5>
    <div class="container">
        <form action="{{ route('service.create') }}" method="get">
            <button class="btn btn-secondary create-new btn-primary mb-3" tabindex="0"><span><i
                class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">
                    @lang('messages.store')
            </button>
        </form>
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>@lang('messages.icon')</th>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.content')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $i => $service)
                        <tr>
                            <td>{{ $i += 1 }}</td>
                            <td><i class="{{ $service->icon }}"></i></td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->created_at }}</td>
                            <td>
                                <form action="{{ route('service.destroy', $service->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('service.edit', $service->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            @lang('messages.edit')
                                        </a>
                                          <button class="dropdown-item del">
                                            <i class="bx bx-trash me-1"></i>
                                            @lang('messages.delete')
                                          </button>
                                      </div>
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
