@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.facility') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <span class="breadcrumb-item active">{{ __('messages.facilities') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('facility.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.facility') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($facilities as $key => $facility)
                            <tr>
                                <td scope="row">{!! $key + $facilities->firstItem() !!}</td>
                                <td>{!! $facility -> name !!}</td>
                                <td class="text-center font-size-18">
                                    {!! Form::open(['route' => ['facility.edit', $facility->id], 'method' => 'GET']) !!}
                                        {!! Form::button('<i class="ti-pencil"></i>', ['class' => 'text-gray', 'type' => 'submit', 'title' => __('messages.edit')]) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ['facility.destroy', $facility->id], 'method' => 'DELETE']) !!}
                                        {!! Form::button('<i class="ti-trash"></i>', ['class' => 'text-gray', 'type' => 'submit', 'title' => __('messages.delete')]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        {{ $facilities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
