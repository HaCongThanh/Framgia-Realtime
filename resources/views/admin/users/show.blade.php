@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <div class="page-header">
                <h2 class="header-title">Vai trò</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Bảng điều khiển</a>
                        <a class="breadcrumb-item">Quản lý người dùng</a>
                        <a href="{{ route('users.index') }}" class="breadcrumb-item">Danh sách nhân viên</a>
                        <span class="breadcrumb-item active">Vai trò</span>
                    </nav>
                </div>
            </div>

            {{-- <input type="hidden" id="role_id" name="role_id" value="{{ $user_id }}"> --}}

            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="permission_role_table" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">Vai trò</th>
                                    <th style="text-align: center;">Miêu tả</th>
                                    <th style="text-align: center;">Quyền hạn</th>
                                    <th style="text-align: center;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (!empty($roles))
                                    @foreach ($roles as $key => $role)
                                        
                                        <tr>
                                            <td style="text-align: center;">{{ $key + 1 }}</td>
                                            <td style="text-align: center;">
                                                <div class="list-media">
                                                    <a class="title">{{ $role->display_name }}</a>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">{{ $role->description }}</td>
                                            <td style="width: 50%;">
                                                @if (!empty($role->permissions))
                                                    @foreach ($role->permissions as $permission)
                                                        <span class="badge badge-pill badge-gradient-success">
                                                            {{ $permission->display_name }}
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center font-size-18" style="text-align: center;">
                                                <input type="hidden" id="checked-{{ $role->id }}" value="{{ $role->checked }}">

                                                @if($role->checked == 1)
                                                    <i id="action-{{ $role->id }}" class="fa fa-check-circle" onclick="updateRole({{ $user->id }}, {{ $role->id }})" aria-hidden="true" style="cursor: pointer; color: #3598dc; font-size: 20px;"></i>
                                                @else 
                                                    <i id="action-{{ $role->id }}" class="fa fa-circle-o" onclick="updateRole({{ $user->id }}, {{ $role->id }})" aria-hidden="true" style="cursor: pointer; color: #3598dc; font-size: 20px;"></i>

                                                @endif

                                            </td>
                                        </tr>

                                    @endforeach
                                @endif

                            </tbody>
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

    <script>
        function updateRole(user_id, role_id) {
            var checked = $('#checked-' + role_id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.users.update_role_user') }}',
                data: {
                    user_id: user_id,
                    role_id: role_id,
                    checked: checked,
                },
                success: function(res)
                {
                    if (res.message == 'deleted') {
                        $('#action-' + role_id).removeClass('fa-check-circle').addClass('fa-circle-o');
                        $('#checked-' + role_id).val(0);
                        toastr.success('Xóa thành công');
                    } 

                    if (res.message == 'added') {
                        $('#action-' + role_id).removeClass('fa-circle-o').addClass('fa-check-circle');
                        $('#checked-' + role_id).val(1);
                        toastr.success('Thêm thành công');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        }
    </script>
@endsection
