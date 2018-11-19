@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">

    <style type="text/css">
        table>thead>tr>th,
        table>tbody>tr>td {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.room_types_list') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.list') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                @if (Entrust::can('add-room-types'))
                    <div class="card-header border bottom">
                        <a href="{{ route('room-types.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                    </div>
                @endif

                <div class="card-body">
                    <table class="table table-hover" id="room_types_table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('messages.id') }}</th>
                                <th scope="col">{{ __('messages.room_type') }}</th>
                                <th scope="col">{{ __('messages.room_size') }}</th>
                                <th scope="col">{{ __('messages.bed') }}</th>
                                <th scope="col">{{ __('messages.people') }}</th>
                                <th scope="col">{{ __('messages.price') }}</th>
                                <th scope="col">{{ __('messages.action') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            {{-- <div class="modal fade" id="modal-lg{{ $stt }}">
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
                                                                @foreach ($room->images as $image)
                                                                <div class="carousel-item
                                                                @if ($loop->first) active @endif">
                                                                    <div class="bg-overlay">
                                                                        <img class="d-block w-100" src="{{ asset('images/rooms/'.$image->filename) }}" alt="First slide">
                                                                    </div>
                                                                </div>
                                                                @endforeach
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
                                            <p>{{ __('messages.room_type') }}: {{ $room->name }}</p>
                                            <p>{{ __('messages.room_size') }}: {{ $room->room_size }}</p>
                                            <p>{{ __('messages.bed') }}: {{ $room->bed }}</p>
                                            <p>{{ __('messages.people') }}: {{ $room->max_people }}</p>
                                            <p>{{ __('messages.price') }}: {{ number_format($room->price) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>{{ __('messages.description') }}: {!! $room->description !!}</p>
                                    </div>
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                         <p>{{ __('messages.facility') }}:</p>
                                     </div>
                                    @foreach($room->facilities as $facility)
                                    <div class="col-md-3">
                                            {{ $facility->name }} <br>
                                    </div>
                                    @endforeach
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
            </div> --}}

        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    @routes
    <script src="{{ mix('js/admin/room-type.js') }}"></script>
@endsection
