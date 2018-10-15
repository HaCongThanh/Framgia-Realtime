@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Sửa phòng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="/admin/rooms">Danh sách phòng</a>
                        <span class="breadcrumb-item active">Sửa phòng</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {!! Form::open(['route'=>'', 'method'=>'POST']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('floor', "Tầng:", ['class'=>'control-label']) !!}
                                {!! Form::text('floor', null, ['class'=>'form-control form-control-sm', 'placeholder'=>"Số tầng"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('room_type', "Loại phòng:", ['class'=>'control-label']) !!}
                                {!! Form::select('room_type',['L' => 'Large', 'S' => 'Small'], ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('max_people', "Số người/phòng:", ['class'=>'control-label']) !!}
                                {!! Form::text('floor', 'value', ['class'=>'form-control form-control-sm']) !!}
                                <input type="text" class="form-control form-control-sm" placeholder="">
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', "Giá phòng:", ['class'=>'control-label']) !!}
                                {!! Form::text('floor', 'value', ['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                        {!! Form::submit("Lưu", ['class'=>'btn btn-info btn-float btn-outline']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection