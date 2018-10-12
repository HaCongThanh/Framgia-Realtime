@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.posts_edit') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="{{ route('post') }}">{{ __('messages.posts') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.edit') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                {!! Form::open(['route'=>'category_create', 'method'=>'POST', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name', __('messages.posts_name'), ['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control form-control-sm']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', __('messages.slug'), ['class'=>'control-label']) !!}
                    {!! Form::text('slug', "value", ['class'=>'form-control form-control-sm']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', __('messages.categories'), ['class'=>'control-label']) !!}
                    {!! Form::select('category',['L' => 'Large', 'S' => 'Small'], 'S', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', __('messages.description'), ['class'=>'control-label']) !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>__('messages.description_text'), 'rows'=>"3"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', __('messages.content'), ['class'=>'control-label']) !!}
                    {!! Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>__('messages.content_text'), 'rows'=>"3", 'id'=>'editor1']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', __('messages.image'), ['class'=>'control-label']) !!}
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">{{ __('messages.file') }}</span>
                                    <span class="fileinput-exists">{{ __('messages.change') }}</span>
                                    {!! Form::file('image') !!}
                                </span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                    </div>
                </div>
                {!! Form::submit(__('messages.update'), ['class'=>'btn btn-info btn-float btn-outline']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection