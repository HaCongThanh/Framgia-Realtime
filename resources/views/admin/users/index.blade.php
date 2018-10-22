@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.user_list') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('Bảng điều khiển') }}</a>
                        <span class="breadcrumb-item active">{{ __('Danh sách nhân viên') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-header border bottom">
                    <button type="button" id="call_add_user" class="btn btn-success"><i class="ti-plus"></i> {{ __('messages.add') }}</button>
                </div>
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">{{ __('Họ và tên') }}</th>
                                <th style="text-align: center;">{{ __('messages.gender') }}</th>
                                <th style="text-align: center;">{{ __('messages.phone') }}</th>
                                <th style="text-align: center;">{{ __('messages.email') }}</th>
                                <th style="text-align: center;">{{ __('Vai trò') }}</th>
                                <th style="text-align: center;">{{ __('messages.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if (!empty($users))
                                    @foreach ($users as $key => $user)
                                        
                                        <tr>
                                            <td style="text-align: center;">{{ $key + 1 }}</td>
                                            <td style="text-align: center;">
                                                <div class="list-media">
                                                    <a href="#" class="title">{{ $user->name }}</a>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                @if ($user->gender == 1)
                                                    <i class="fa fa-mars" style="font-weight:bold; color: blue"></i>
                                                @else
                                                    <i class="fa fa-venus" style="font-weight:bold; color: red"></i>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">{{ $user->mobile }}</td>
                                            <td style="text-align: center;">{{ $user->email }}</td>
                                            <td style="text-align: center;">
                                                @if (!empty($user->roles))
                                                    @foreach ($user->roles as $role)
                                                        @if ($role->display_name == 'Super Admin')
                                                            <span class="badge badge-pill badge-gradient-warning">
                                                                {{ $role->display_name }}
                                                            </span>
                                                        @elseif ($role->display_name == 'Quản Lý')
                                                            <span class="badge badge-pill badge-danger">
                                                                {{ $role->display_name }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-pill badge-gradient-success">
                                                                {{ $role->display_name }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center font-size-18" style="text-align: center;">
                                                <a href="{{ route('users.show', $user->id) }}" class="text-gray" data-tooltip="tooltip" title="{{ __('Vai trò') }}"><i class="ti-lock"></i></a>
                                                <a href="#" class="text-gray" data-tooltip="tooltip" title="{{ __('messages.edit') }}"><i class="ti-pencil"></i></a>
                                                <a href="#" class="text-gray" data-tooltip="tooltip" title="{{ __('messages.delete') }}"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add_user_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Thêm mới nhân viên</h4>
                        </div>
                        <div class="modal-body">

                            <form id="add_user_form" name="add_user_form" action="" method="POST">
                                {{ csrf_field() }}

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Tên hiển thị">
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Vai trò">
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control" id="description" name="description" placeholder="Miêu tả"></textarea>
                                </div>
                                
                                <div class="modal-footer no-border">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                    <button type="submit" id="add_user" class="btn btn-success">Tạo</button>
                                </div>
                            </form>

                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>

    <script>
        /*Gọi Modal thêm mới nhân viên*/
        $(document).on('click', '#call_add_user', function() {
            $('#add_user_modal').modal('show');
            $('#name').val('');
            $('#display_name').val('');
            $('#description').val('');
        });
        /*--------------------------*/
    </script>
@endsection