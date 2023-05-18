@extends('layouts.backend')

@section('content')

@section('title')
    <title>@lang('messages.permissions')</title>
@endsection

<div>
    <div>
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="role-title">@lang('messages.givePermission') ({{ $user->name }})</h3>
                    <input type="checkbox" name="checkAll" {{ $user->hasRole(['publisher','destroyer','editor,']) ? 'checked' : '' }} id="checkAll" class="form-check-input" />
                    <label class="form-check-label" for="checkAll">
                        @lang('messages.chooseAll')
                    </label>
                </div>
                <form action="{{ route('storeRole') }}" 
                    method="POST" id="addRoleForm" class="row g-3">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" name="roles[]" {{ $user->hasRole('publisher') ? 'checked' : '' }} 
                                                    value="1"
                                                    class="form-check-input" id="flexSwitchCheckDefault">
                                                    <label style="margin-right:10px;" class="form-check-label" for="flexSwitchCheckDefault">
                                                        @lang('messages.publish')(@lang('messages.permission'))
                                                    </label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" name="roles[]" {{ $user->hasRole('editor') ? 'checked' : '' }} 
                                                    value="2"
                                                    class="form-check-input" id="flexSwitchCheckDefault">
                                                    <label style="margin-right:10px;" class="form-check-label" for="flexSwitchCheckDefault">
                                                        @lang('messages.edit')(@lang('messages.permission'))
                                                    </label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" name="roles[]" {{ $user->hasRole('destroyer') ? 'checked' : '' }} 
                                                    value="3"
                                                    class="form-check-input" id="flexSwitchCheckDefault">
                                                    <label style="margin-right:10px;" class="form-check-label" for="flexSwitchCheckDefault">
                                                        @lang('messages.destroy')(@lang('messages.permission'))                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">
                            @lang('messages.confirm')</button>
                        <a href="{{ route('user-and-roles.index') }}" class="btn btn-label-secondary">
                            @lang('messages.cancel')
                        </a>
                    </div>
                </form>
                <script>
                    $('#checkAll').click(function() {
                        $('input[type=checkbox]').prop('checked', this.checked);
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->
@endsection
