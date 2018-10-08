@extends('admin.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Danh sách loại phòng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Tables</a>
                        <span class="breadcrumb-item active">Basic Table</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="/admin/room_types/create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Loại phòng</th>
                            <th scope="col">Diện tích</th>
                            <th scope="col">Số giường ngủ</th>
                            <th scope="col">Số người/phòng</th>
                            <th scope="col">Giá phòng</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td class="text-center font-size-18">
                                <a href="" data-toggle="modal" data-target="#modal-lg" class="text-gray m-r-15" title="Xem chi tiết"><i class="ti-eye"></i></a>
                                <a href="/admin/room_types/edit" class="text-gray m-r-15" title="Sửa"><i class="ti-pencil"></i></a>
                                <a href="" class="text-gray" title="Xóa"><i class="ti-trash"></i></a>
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
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="card">
                                                    <div class="card-header border bottom">
                                                        <h4 class="card-title">Ảnh</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row m-t-25">
                                                            <div class="col-md-8 offset-md-2">
                                                                <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel">
                                                                    <ol class="carousel-indicators">
                                                                        <li data-target="#carouselExampleCaption" data-slide-to="0" class="active"></li>
                                                                        <li data-target="#carouselExampleCaption" data-slide-to="1"></li>
                                                                        <li data-target="#carouselExampleCaption" data-slide-to="2"></li>
                                                                    </ol>
                                                                    <div class="carousel-inner">
                                                                        <div class="carousel-item active">
                                                                            <div class="bg-overlay">
                                                                                <img class="d-block w-100" src="assets/images/others/img-17.jpg" alt="First slide">
                                                                            </div>
                                                                        </div>
                                                                        <div class="carousel-item">
                                                                            <div class="bg-overlay">
                                                                                <img class="d-block w-100" src="assets/images/others/img-18.jpg" alt="Second slide">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
                                                                        <span class="mdi mdi-chevron-left font-size-35" aria-hidden="true"></span>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
                                                                        <span class="mdi mdi-chevron-right font-size-35" aria-hidden="true"></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="">
                                                    <p>Loại phòng: </p>
                                                    <p>Diện tích: </p>
                                                    <p>Số giường ngủ: </p>
                                                    <p>Số người/phòng: </p>
                                                    <p>Giá phòng: </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <p>Mô tả: </p>
                                                <p>Tiện ích: </p>
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
    <!-- Content Wrapper END -->
@endsection