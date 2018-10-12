@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.categories_edit') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('category') }}">{{ __('messages.categories') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.edit') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    {!! Form::open(['method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('name', __('messages.categories'), ['class' => 'control-label']) !!}
                            {!! Form::text('name', $category -> name, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        {!! Form::submit(__('messages.update'), ['class' => 'btn btn-info btn-float btn-outline']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
