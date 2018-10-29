@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">

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
                        <span class="breadcrumb-item active">Danh sách</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Tên hiển thị</th>
                                <th style="text-align: center;">Quyền hạn</th>
                                <th style="text-align: center;">Miêu tả</th>
                                <th style="text-align: center;">Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key=>$permission)
                                <tr>
                                    <td>{!! $key + $permissions->firstItem() !!}</td>
                                    <td>{!! $permission->display_name !!}</td>
                                    <td>{!! $permission->name !!}</td>
                                    <td>{!! $permission->description !!}</td>
                                    <td>{!! $permission->created_at !!}</td>
                                </tr>
                                @endforeach
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
@endsection
