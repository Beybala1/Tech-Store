@extends('layouts.backend')

@section('content')
@section('title')
    <title>@lang('messages.about')</title>
@endsection
<div class="card">
    <h5 class="card-header">@lang('messages.about')</h5>
    <div class="container">
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>@lang('messages.image')</th>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.content')</th>
                        <th>@lang('messages.alt')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $i => $about)
                        <tr>
                            <td>{{ $i += 1 }}</td>
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3">
                                            <span
                                                class="avatar-initial rounded-circle
                                            bg-label-dark">
                                                <img src="{{ asset($about->image) }}">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->description }}</td>
                            <td>{{ $about->alt }}</td>
                            <td>{{ $about->created_at }}</td>
                            <td>
                                <form action="{{ route('about.destroy', $about->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('about.edit', $about->id) }}">
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
