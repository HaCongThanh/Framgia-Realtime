@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href={{mix('css/admin/dataTables.bootstrap4.min.css')}} />
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Danh sách khách hàng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Tables</a>
                        <span class="breadcrumb-item active">Data Table</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số lần tới khách sạn</th>
                                <th>Số tiền đã dùng</th>
                                <th>Khách hàng đánh giá</th>
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
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Nam</td>
                                <td>08 May 2018</td>
                                <td>0123456789</td>
                                <td>Example@gmail.com</td>
                                <td class="text-center font-size-18">
                                    <a href="" data-toggle="modal" data-target="#modal-lg" class="text-gray m-r-15"title="Chi tiết"><i class="ti-eye"></i></a>
                                    <a href="#" class="text-gray m-r-15"title="Sửa"><i class="ti-pencil"></i></a>
                                    <a href="#" class="text-gray" title="Xóa"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- Modal START-->
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Thông tin chi tiết</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-15 m-v-40">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <p>Tên khách hàng: </p>
                                                    <p>Ngày sinh: </p>
                                                    <p>Giới tính: </p>
                                                    <p>Số điện thoại: </p>
                                                    <p>Email: </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Địa chỉ: </p>
                                                    <p>Số lần tới khách sạn: </p>
                                                    <p>Số tiền đã sử dụng: </p>
                                                    <p>Khách hàng đánh giá: </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-border">
                                        <div class="text-right">
                                            <button class="btn btn-success" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal END-->
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