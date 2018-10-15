@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.room_types_list') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <span class="breadcrumb-item active">{{ __('messages.list') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('room_type_create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.room_type') }}</th>
                            <th scope="col">{{ __('messages.room_size') }}</th>
                            <th scope="col">{{ __('messages.bed') }}</th>
                            <th scope="col">{{ __('messages.people') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td class="text-center font-size-18">
                                <a href="" data-toggle="modal" data-target="#modal-lg" class="text-gray m-r-15" title="{{ __('messages.view') }}"><i class="ti-eye"></i></a>
                                <a href="/admin/room_types/edit" class="text-gray m-r-15" title="{{ __('messages.edit') }}"><i class="ti-pencil"></i></a>
                                <a href="/admin/room_types/edit" class="text-gray m-r-15" title="{{ __('messages.delete') }}"><i class="ti-trash"></i></a>
                                {{--{!! Form::open(['route'=>['category_delete',$category->id], 'method'=>'POST']) !!}--}}
                                    {{--{!! Form::submit('<i class="ti-trash"></i>', ['class'=>'text-gray', 'title'=>"{{ __('messages.delete') }}"]) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            </td>
                        </tr>
                        <!-- Modal START-->
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>{{ __('messages.information') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-15 m-v-40">
                                            <div class="row ">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="card">
                                                        <div class="card-header border bottom">
                                                            <h4 class="card-title">{{ __('messages.image') }}</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row m-t-25">
                                                                <div class="col-md-8 offset-md-2">
                                                                    <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel">
                                                                        <ol class="carousel-indicators">
                                                                            <li data-target="#carouselExampleCaption" data-slide-to="0" class="active"></li>
                                                                            <li data-target="#carouselExampleCaption" data-slide-to="1"></li>
                                                                            <li data-target="#carouselExampleCaption" data-slide-to="2"></li>
                                                                        </ol>
                                                                        <div class="carousel-inner">
                                                                            <div class="carousel-item active">
                                                                                <div class="bg-overlay">
                                                                                    <img class="d-block w-100" src="assets/images/others/img-17.jpg" alt="First slide">
                                                                                </div>
                                                                            </div>
                                                                            <div class="carousel-item">
                                                                                <div class="bg-overlay">
                                                                                    <img class="d-block w-100" src="assets/images/others/img-18.jpg" alt="Second slide">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
                                                                            <span class="mdi mdi-chevron-left font-size-35" aria-hidden="true"></span>
                                                                        </a>
                                                                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-slide="next">
                                                                            <span class="mdi mdi-chevron-right font-size-35" aria-hidden="true"></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="">
                                                        <p>{{ __('messages.room_type') }}: </p>
                                                        <p>{{ __('messages.room_size') }}: </p>
                                                        <p>{{ __('messages.bed') }}: </p>
                                                        <p>{{ __('messages.people') }}: </p>
                                                        <p>{{ __('messages.price') }}: </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <p>{{ __('messages.description') }}: </p>
                                                    <p>{{ __('messages.facility') }}: </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-border">
                                        <div class="text-right">
                                            <button class="btn btn-success" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal END-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
