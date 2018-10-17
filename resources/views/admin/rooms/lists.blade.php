@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.rooms') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <span class="breadcrumb-item active">{{ __('messages.list') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('room_create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.rooms_stt') }}</th>
                            <th scope="col">{{ __('messages.room_type') }}</th>
                            <th scope="col">{{ __('messages.floor') }}</th>
                            <th scope="col">{{ __('messages.people') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->room_types->name }}</td>
                                <td>{{ $room->floor }}</td>
                                <td>{{ $room->room_types->max_people }}</td>
                                <td>{{ $room->room_types->price }}</td>
                                <td class="text-center font-size-18">
                                    {{--<a href="" data-toggle="modal" data-target="#modal-lg" class="text-gray m-r-15" title="{{ __('messages.view') }}"><i class="ti-eye"></i></a>--}}
                                    {!! Form::open(['route'=>['room_edit', $room->id], 'method'=>'GET']) !!}
                                        {!! Form::button('<i class="ti-pencil"></i>', ['class' => 'text-gray', 'title' => __('messages.edit'), 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['route'=>['room_delete',$room->id], 'method'=>'POST']) !!}
                                        {!! Form::button('<i class="ti-trash"></i>', ['class' => 'text-gray', 'title' => __('messages.delete'), 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Modal START-->
                    {{--<div class="modal fade" id="modal-lg">--}}
                        {{--<div class="modal-dialog modal-lg" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<h4>{{ __('messages.information') }}</h4>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="p-15 m-v-40">--}}
                                        {{--<div class="row ">--}}
                                            {{--<div class="col-md-6">--}}

                                            {{--</div>--}}
                                            {{--<div class="col-md-6">--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer no-border">--}}
                                    {{--<div class="text-right">--}}
                                        {{--<button class="btn btn-success" data-dismiss="modal">OK</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!-- Modal END-->
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection