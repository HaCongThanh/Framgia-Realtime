@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">

    <style type="text/css">
        table>tbody>tr>td {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    
    <div class="main-content">
        <div class="container-fluid">

            <div class="page-header">
                <h2 class="header-title">{{ __('messages.roles') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.roles') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-header border bottom">
                    <button type="button" id="call_add_role" class="btn btn-success"><i class="ti-plus"></i> {{ __('messages.add') }}</button>
                </div>

                <div class="card-body">
                    <div class="table-overflow">
                        <table id="roles_table" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">{{ __('messages.name_view') }}</th>
                                    <th style="text-align: center;">{{ __('messages.roles') }}</th>
                                    <th style="text-align: center;">{{ __('messages.describe') }}</th>
                                    <th style="text-align: center;">{{ __('messages.date_created') }}</th>
                                    <th style="text-align: center;">{{ __('messages.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div> 
                </div>       
            </div>

            <div class="modal fade" id="add_role_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>{{ __('messages.role_add') }}</h4>
                        </div>
                        <div class="modal-body">

                            <form id="add_role_form" name="add_role_form" action="" method="POST">
                                {{ csrf_field() }}

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="display_name" name="display_name" placeholder="{{ __('messages.name_view') }}">
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('messages.roles') }}">
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control" id="description" name="description" placeholder="{{ __('messages.describe') }}"></textarea>
                                </div>
                                
                                <div class="modal-footer no-border">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('messages.cancel') }}</button>
                                    <button type="submit" id="add_role" class="btn btn-success">Tạo</button>
                                </div>
                            </form>

                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit_role_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>{{ __('messages.role_update') }}</h4>
                        </div>
                        <div class="modal-body">

                            <form id="edit_role_form" name="edit_role_form" action="" method="POST">
                                <input type="hidden" value="PUT" name="_method">
                                <input type="hidden" id="role_id" name="role_id">
                                {{ csrf_field() }}

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="edit_display_name" name="display_name" placeholder="{{ __('messages.name_view') }}">
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="edit_name" name="name" placeholder="{{ __('messages.roles') }}">
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control" id="edit_description" name="description" placeholder="{{ __('messages.describe') }}"></textarea>
                                </div>
                                
                                <div class="modal-footer no-border">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('messages.cancel') }}</button>
                                    <button type="submit" id="edit_role" class="btn btn-success">{{ __('messages.update') }}</button>
                                </div>
                            </form>

                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    @routes
    <script src="{{ mix('js/admin/role.js') }}"></script>
@endsection
