@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
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
                                <th>#</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số tiền đã dùng</th>
                                <th>Khách hàng đánh giá</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($stt = 0)
                            @foreach ($lists as $key => $list)
                            <tr>
                                <td>{{ $key + $lists->firstItem() }}</td>
                                <td>
                                    {{ $list->users->name }}
                                    {{--<div class="list-media">
                                        <div class="list-item">
                                            <div class="media-img">
                                                <img src="{{ url('img/avatar/avatar-5.png') }}" alt="{{ $list->users->name }}">
                                            </div>
                                            <div class="info">
                                                <span class="title">{{ $list->users->name }}</span>
                                            </div>
                                        </div>
                                    </div>--}}
                                </td>
                                <td>{{ $list->users->email }}</td>
                                <td>Chua goi duoc</td>
                                <td>{{ $list->note }}</td>
                                <td class="text-center font-size-18">
                                    <a href="" data-toggle="modal" data-target="#modal-lg{{ $stt+=1 }}" class="text-gray m-r-15"title="Chi tiết"><i class="ti-eye"></i></a>
{{--
                                    <a href="#" class="text-gray m-r-15"title="Sửa"><i class="ti-pencil"></i></a>
--}}
                                    <a data-id="{{ $list->id }}" id="btn_delete" class="text-gray" title="Xóa"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal START-->
                            <div class="modal fade" id="modal-lg{{ $stt }}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Thông tin chi tiết</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="p-15 m-v-40">
                                                <div class="row ">
                                                    <div class="col-md-6">
                                                        <p>Tên khách hàng: {{ $list->users->name }}</p>
                                                        <p>Ngày sinh: {{ $list->users->birthday }}</p>
                                                        <p>Giới tính:
                                                            @if ($list->users->gender == 1)
                                                                Nam
                                                            @else
                                                                Nữ
                                                            @endif
                                                        </p>
                                                        <p>Số điện thoại: {{ $list->users->mobile }}</p>
                                                        <p>Email: {{ $list->users->email }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Địa chỉ: {{ $list->users->address }}</p>
                                                        <p>Số lần tới khách sạn: </p>
                                                        <p>Số tiền đã sử dụng: </p>
                                                        <p>Khách hàng đánh giá: {{ $list->note }}</p>
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
                            @endforeach
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
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script>
        $(document).on('click', '#btn_delete', function (event) {
            event.preventDefault();

            var customer_id = $(this).data('id');

            swal({
                title: "Bạn có chắc muốn xóa?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Không",
                confirmButtonText: "Có"
            }, function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url: '/admin/customers/' + customer_id,
                    success: function(res) {
                        //console.log(res);
                        toastr.success('Xóa khách hàng thành công !');
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    },
                    error: function error(xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            });
        })
    </script>
@endsection