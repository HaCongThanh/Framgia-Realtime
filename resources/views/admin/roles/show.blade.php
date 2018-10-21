@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">

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
                <h2 class="header-title">Quyền hạn</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Bảng điều khiển</a>
                        <a class="breadcrumb-item">Quản trị hệ thống</a>
                        <a href="{{ route('roles.index') }}" class="breadcrumb-item">Vai trò</a>
                        <span class="breadcrumb-item active">Quyền hạn</span>
                    </nav>
                </div>
            </div>

            <input type="hidden" id="role_id" name="role_id" value="{{ $role_id }}">

            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="permission_role_table" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">Quyền hạn</th>
                                    <th style="text-align: center;">Miêu tả</th>
                                    <th style="text-align: center;">Ngày tạo</th>
                                    <th style="text-align: center;">Hành động</th>
                                </tr>
                            </thead>
                        </table>
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
    {{-- @routes
    <script src="{{ mix('js/admin/role.js') }}"></script> --}}
    <script>
        /*DataTable*/
        var role_id = $('#role_id').val();

        var table = $('#permission_role_table').DataTable({
            processing: true,
            language: {
                processing: "<div id='loader'>Đang tìm! Chờ chút. Hmm...!</div>"
            },
            serverSide: true,
            // ordering: false,
            order: [],
            ajax: '{{ route('admin.roles.get_list_permission_role', [$role_id]) }}',
            columns: [
                {data: 'DT_Row_Index', name: 'id'},
                {data: 'display_name', name: 'display_name'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'}
            ]
        });
        /*----------*/

        /*Thêm - Xóa quyền hạn*/
        function updatePermission(role_id, permission_id) {
            var checked = $('#checked-' + permission_id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.roles.update_permission_role') }}',
                data: {
                    checked: checked,
                    role_id: role_id,
                    permission_id: permission_id,
                },
                success: function(res)
                {
                    if (res.message == 'deleted') {
                        $('#action-' + permission_id).removeClass('fa-check-circle').addClass('fa-circle-o');
                        $('#checked-' + permission_id).val(0);
                        toastr.success('Xóa thành công');
                    } 

                    if (res.message == 'added') {
                        $('#action-' + permission_id).removeClass('fa-circle-o').addClass('fa-check-circle');
                        $('#checked-' + permission_id).val(1);
                        toastr.success('Thêm thành công');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        }
        /*--------------------*/
    </script>
@endsection
