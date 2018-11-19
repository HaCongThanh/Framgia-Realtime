@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">

    <style type="text/css">
        table>thead>tr>th,
        table>tbody>tr>td {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.facility') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <span class="breadcrumb-item active">{{ __('messages.facilities') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                @if (Entrust::can('add-facilities'))
                    <div class="card-header border bottom">
                        <button type="button" id="add_facility_call" class="btn btn-success"><i class="ti-plus"></i> {{ __('messages.add') }}</button>
                    </div>
                @endif

                <div class="card-body">
                    <table class="table table-hover" id="facilities_table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('messages.id') }}</th>
                                <th scope="col">{{ __('messages.facilities') }}</th>
                                <th scope="col">{{ __('messages.action') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <div class="modal fade" id="add_facility_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>{{ __('messages.facility_add') }}</h4>
                        </div>

                        <div class="modal-body">
                            <form id="add_facility_form" name="add_facility_form" action="" method="POST">
                                {{ csrf_field() }}

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('messages.facility_name') }}">
                                </div>
                                
                                <div class="modal-footer no-border">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('messages.cancel') }}</button>
                                    <button type="submit" id="add_facility_btn" class="btn btn-success">Tạo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit_facility_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>{{ __('messages.facility_edit') }}</h4>
                        </div>

                        <div class="modal-body">
                            <form id="edit_facility_form" name="edit_facility_form" action="" method="POST">
                                <input type="hidden" value="PUT" name="_method">
                                <input type="hidden" id="facility_id" name="facility_id">
                                {{ csrf_field() }}

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="edit_name" name="name" placeholder="{{ __('messages.facility_name') }}">
                                </div>
                                
                                <div class="modal-footer no-border">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('messages.cancel') }}</button>
                                    <button type="submit" id="edit_facility_btn" class="btn btn-success">{{ __('messages.update') }}</button>
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
    <script src="{{ mix('js/admin/facility.js') }}"></script>
@endsection
