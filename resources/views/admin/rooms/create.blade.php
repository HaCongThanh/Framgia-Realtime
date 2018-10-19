@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.rooms_add') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <a class="breadcrumb-item" href="{{ route('room.index') }}">{{ __('messages.list') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.rooms_add') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                <div class="card-body">
                    {!! Form::open(['route' => 'room.store', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-md-6 room">
                            <div class="form-group">
                                {!! Form::label('floor', __('messages.floor'), ['class' => 'control-label']) !!}
                                {!! Form::text('floor', null, ['class' => 'form-control form-control-sm', 'placeholder' => __('messages.floor_stt')]) !!}
                            </div>
                        </div>
                        <div class="col-md-6 room">
                            <div class="form-group">
                                {!! Form::label('room_type', __('messages.room_type'), ['class'=>'control-label']) !!}
                                {!! Form::select('room_type', $room_types, '', ['class' => 'form-control', 'id' => 'type', 'data-depenment' => 'state']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            {!! Form::submit(__('messages.add'), ['class'=>'btn btn-info btn-float btn-outline']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
