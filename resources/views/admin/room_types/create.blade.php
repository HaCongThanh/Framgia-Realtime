@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href={{asset('bower_components/lib_booking/lib/admin/css/jasny-bootstrap.min.css')}} />
    <link rel="stylesheet" href={{asset('bower_components/lib_booking/lib/admin/css/selectize.default.css')}} />
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.room_type_add') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('room_type') }}">{{ __('messages.room_type') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.add') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open([ 'route' => 'room_type_create', 'method' => 'POST', 'files' => true ]) !!}
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('name', __('messages.room_type'), ['class' => 'control-label' ]) !!}
                                {!! Form::text('name', null, [ 'class' => 'form-control form-control-sm', 'placeholder' => __('messages.room_type_name') ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('room_size', __('messages.room_size'), ['class'=>'control-label']) !!}
                                {!! Form::text('room_size', null, [ 'class' => 'form-control form-control-sm', 'placeholder' => __('messages.room_size_text') ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('bed', __('messages.bed'), [ 'class'=>'control-label' ]) !!}
                                {!! Form::text('bed', null, [ 'class'=>'form-control form-control-sm', 'placeholder' => __('messages.bed') ]) !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('max_people', __('messages.people'), [ 'class'=>'control-label' ]) !!}
                                {!! Form::text('max_people', null, [ 'class' => 'form-control form-control-sm', 'placeholder' => __('messages.people') ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', __('messages.price'), [ 'class' => 'control-label' ]) !!}
                                {!! Form::text('price', null, [ 'class' => 'form-control form-control-sm', 'placeholder' => __('messages.price') ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('image', __('messages.image'), [ 'class' => 'control-label' ]) !!}
                                <br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">{{ __('messages.file') }}</span>
                                        <span class="fileinput-exists">{{ __('messages.change') }}</span>
                                        {{Form::file('image[]', ['multiple' => true,  'id' => 'exampleInputFile'])}}
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('description', __('messages.description'), [ 'class' => 'control-label' ]) !!}
                                <div class="m-t-15">
                                    {!! Form::textarea('description', '', ['class' => 'form-control form-control-sm', 'id' => 'editor1']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', __('messages.facility'), [ 'class' => 'control-label' ]) !!}
                                <div class="row">
                                    @php($check = 1)
                                    @foreach($facilities as $facility)
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            {{--{!! Form::checkbox('facilities', $facility->name, '', [ 'id' => "check" ]) !!}--}}
                                            <input id="check{{ $check+=1 }}" name="facilities[]" type="checkbox" value="{{ $facility->id }}">
                                            <label for="check{{ $check }}"></label>
                                            {{ Form::label($facility->name) }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit(__('messages.add'), ['class'=>'btn btn-info btn-float btn-outline', 'id' => 'submit']) !!}
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
@endsection
