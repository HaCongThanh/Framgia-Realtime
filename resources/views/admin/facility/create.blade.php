@extends('admin.layouts.master')

@section('content')

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.facility_add') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('facility.index') }}">{{ __('messages.facilities') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.add') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">

                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach

                <div class="card-body">

                    {!! Form::open(['route' => 'facility.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('name', __('messages.facility'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control form-control-sm','placeholder' => __('messages.facility')]) !!}
                    </div>
                    {!! Form::submit(__('messages.add'), ['class' => 'btn btn-info btn-float btn-outline']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
