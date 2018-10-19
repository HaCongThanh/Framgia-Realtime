@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.rooms') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.list') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('room.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.rooms_stt') }}</th>
                            <th scope="col">{{ __('messages.room_type') }}</th>
                            <th scope="col">{{ __('messages.floor') }}</th>
                            <th scope="col">{{ __('messages.people') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rooms as $key => $room)
                            <tr>
                                <td>{{ $key + $rooms->firstItem() }}</td>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->room_types->name }}</td>
                                <td>{{ $room->floor }}</td>
                                <td>{{ $room->room_types->max_people }}</td>
                                <td>{{ number_format($room->room_types->price) }}</td>
                                <td class="text-center font-size-18">
                                    {!! Form::open(['route'=>['room.edit', $room->id], 'method'=>'GET']) !!}
                                        {!! Form::button('<i class="ti-pencil"></i>', ['class' => 'text-gray', 'title' => __('messages.edit'), 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['route'=>['room.destroy',$room->id], 'method'=>'DELETE']) !!}
                                        {!! Form::button('<i class="ti-trash"></i>', ['class' => 'text-gray', 'title' => __('messages.delete'), 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        {{ $rooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection