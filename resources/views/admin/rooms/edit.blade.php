@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.rooms_edit') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <a class="breadcrumb-item" href="{{ route('room.index') }}">{{ __('messages.rooms') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.edit') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['room.update', $rooms->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('rooms_stt', __('messages.rooms_stt'), ['class' => 'control-label']) !!} : {{ $rooms->id }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('room_type', __('messages.room_type'), ['class' => 'control-label']) !!}
                            {!! Form::select('room_type', $room_types, $selectedTypes, ['class' => 'form-control', 'id' => 'type', 'data-depenment' => 'state']) !!}
                        </div>
                    {!! Form::submit(__('messages.edit'), ['class' => 'btn btn-info btn-float btn-outline']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
