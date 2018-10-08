@extends('admin.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Danh sách đặt phòng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Tables</a>
                        <span class="breadcrumb-item active">Basic Table</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Ngày nhận/ trả</th>
                            <th scope="col">Tổng người</th>
                            <th scope="col">Tổng số phòng</th>
                            <th scope="col">Tổng tiền</th>
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
                                                <p>Ngày nhận phòng: </p>
                                                <p>Ngày trả phòng: </p>
                                                <p>Tổng số người: </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Số phòng: </p>
                                                <p>Loại phòng: </p>
                                                <p>Tầng: </p>
                                                <p>Tổng tiền: </p>
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