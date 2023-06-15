@extends('layouts.backend')

@section('content')
@section('title')
    <title>@lang('messages.message')</title>
@endsection
<div class="card">
    <h5 class="card-header">@lang('messages.message')</h5>
    <div class="container">
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>@lang('messages.name')</th>
                        <th>@lang('messages.email')</th>
                        <th>@lang('messages.phone')</th>
                        <th>@lang('messages.subject')</th>
                        <th>@lang('messages.message')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $i => $message)
                        <tr>
                            <td>{{ $i += 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->created_at }}</td>
                            <td>
                                <form action="{{ route('message.destroy', $message->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('message.show', $message->id) }}">
                                            <i class="fas fa-eye me-1"></i>
                                            @lang('messages.show')
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
