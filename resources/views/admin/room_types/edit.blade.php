@extends('admin.master')

@section('style')
    <link rel="stylesheet" href={{mix('css/admin/jasny-bootstrap.min.css')}} />
    <link rel="stylesheet" href={{mix('css/admin/selectize.default.css')}} />
    <link rel="stylesheet" href={{mix('css/admin/summernote-bs4.css')}} />
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Sửa loại phòng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="/admin/room_types">Loại phòng</a>
                        <span class="breadcrumb-item active">Thêm mới</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Loại phòng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Tên loại phòng">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Diện tích: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Số diện tích">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số giường ngủ: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Số lượng giường ngủ">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Số người/phòng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Số người trên một phòng">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Giá phòng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Nhập giá phòng">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Chọn ảnh</label><br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span><input type="file" name="..."/></span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title m-b-25">Albums</h4>
                                    <div class="row m-t-10">
                                        <div class="col-4 p-h-5">
                                            <a href="#">
                                                <img class="img-fluid w-100" src="../img/logo.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-4 p-h-5">
                                            <a href="#">
                                                <img class="img-fluid w-100" src="assets/images/others/img-12.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="col-4 p-h-5">
                                            <a href="#">
                                                <img class="img-fluid w-100" src="assets/images/others/img-13.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Mô tả: </label>
                                <div class="m-t-15">
                                    <div id="summernote-standard"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tiện ích: </label>
                                <div id="summernote-custom"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-float btn-outline">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src={{mix('js/admin/jasny-bootstrap.min.js')}}></script>
    <script src={{mix('js/admin/selectize.min.js')}}></script>
    <script src={{mix('js/admin/summernote-bs4.min.js')}}></script>
    <script src={{mix('js/admin/form-elements.js')}}></script>
@endsection
