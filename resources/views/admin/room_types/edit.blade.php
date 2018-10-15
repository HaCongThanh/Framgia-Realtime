@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href={{asset('bower_components/lib_booking/lib/admin/css/jasny-bootstrap.min.css')}} />
    <link rel="stylesheet" href={{asset('bower_components/lib_booking/lib/admin/css/selectize.default.css')}} />
    <link rel="stylesheet" href={{asset('bower_components/lib_booking/lib/admin/css/summernote-bs4.css')}} />
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
                        {!! Form::open(['route'=>'', 'method'=>'POST', 'files'=>true]) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('name', "Tên loại phòng:", ['class'=>'control-label']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Tên loại phòng"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('room_size', "Diện tích:", ['class'=>'control-label']) !!}
                                {!! Form::text('room_size', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Số diện tích"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('bed', "Số giường ngủ:", ['class'=>'control-label']) !!}
                                {!! Form::text('bed', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Số lượng giường ngủ"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('max_people', "Số người/phòng:", ['class'=>'control-label']) !!}
                                {!! Form::text('max_people', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Số người trên một phòng"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', "Giá phòng:", ['class'=>'control-label']) !!}
                                {!! Form::text('price', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Nhập giá phòng"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', "Tên loại phòng:", ['class'=>'control-label']) !!}
                                <label class="control-label">Chọn ảnh</label><br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        {!! Form::file('image') !!}
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('depscription', "Mô tả:", ['class'=>'control-label']) !!}
                                <label class="control-label">Mô tả: </label>
                                <div class="m-t-15">
                                    {!! Form::textarea('depscription', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Nhập mô tả", 'rows'=>"3"]) !!}
                                    <div id="summernote-standard"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', "Tên loại phòng:", ['class'=>'control-label']) !!}
                                {!! Form::checkbox('name', 'value') !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        {!! Form::submit("Lưu", ['class'=>'btn btn-info btn-float btn-outline']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper END -->
        @endsection

        @section('script')
            <script src={{asset('bower_components/lib_booking/lib/admin/js/jasny-bootstrap.min.js')}}></script>
            <script src={{asset('bower_components/lib_booking/lib/admin/js/selectize.min.js')}}></script>
            <script src={{asset('bower_components/lib_booking/lib/admin/js/summernote-bs4.min.js')}}></script>
            <script src={{asset('bower_components/lib_booking/lib/admin/js/form-elements.js')}}></script>
@endsection
