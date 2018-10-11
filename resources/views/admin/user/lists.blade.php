@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href={{mix('css/admin/dataTables.bootstrap4.min.css')}} />
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Danh sách nhân viên</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Tables</a>
                        <span class="breadcrumb-item active">Data Table</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="#" class="btn btn-success" title="Thêm mới"><i class="ti-plus"></i>Thêm</a>
                </div>
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                            <tr>
                                <th>Tên nhân viên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Quyền</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">Marshall Nichols</span>
                                                    <span class="sub-title">ID 870</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Nam</td>
                                    <td>08 May 2018</td>
                                    <td>0123456789</td>
                                    <td>Example@gmail.com</td>
                                    <td>Hà Nội</td>
                                    <td><span class="badge badge-pill badge-gradient-success">Admin</span></td>
                                    <td class="text-center font-size-18">
                                        <a href="#" class="text-gray"title="Sửa"><i class="ti-pencil"></i></a>
                                        <a href="#" class="text-gray" title="Xóa"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">Marshall Nichols</span>
                                                    <span class="sub-title">ID 870</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Nam</td>
                                    <td>08 May 2018</td>
                                    <td>0123456789</td>
                                    <td>Example@gmail.com</td>
                                    <td>Hà Nội</td>
                                    <td><span class="badge badge-pill badge-warning">Nhân viên</span></td>
                                    <td class="text-center font-size-18">
                                        <a href="#" class="text-gray m-r-15"title="Sửa"><i class="ti-pencil"></i></a>
                                        <a href="#" class="text-gray" title="Xóa"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src={{mix('js/admin/jquery.dataTables.js')}}></script>
    <script src={{mix('js/admin/dataTables.bootstrap4.min.js')}}></script>
    <script src={{mix('js/admin/data-table.js')}}></script>
@endsection