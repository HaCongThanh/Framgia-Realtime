@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper START -->
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
                    <a href="{{ route('room_type.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.room_type') }}</th>
                            <th scope="col">{{ __('messages.room_size') }}</th>
                            <th scope="col">{{ __('messages.bed') }}</th>
                            <th scope="col">{{ __('messages.people') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php ($stt = 0)
                        @foreach ($room_type as $key => $room)
                        <tr>
                            <td>{{ $key + $room_type->firstItem() }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->room_size }}</td>
                            <td>{{ $room->bed }}</td>
                            <td>{{ $room->max_people }}</td>
                            <td>{{ number_format($room->price) }}</td>
                            <td class="text-center font-size-18">
                                <a data-toggle="modal" data-target="#modal-lg{{ $stt+=1 }}" class="text-gray" title="{{ __('messages.view') }}"><i class="ti-eye"></i></a>
                                @if (Entrust::can(['edit-room-types', 'delete-room-types']))
                                <a href="/admin/room_type/{{ $room->id }}/edit" class="text-gray">
                                    <i class="ti-pencil"></i>
                                </a>
                                <a id="btn_delete" data-id="{{ $room->id }}" class="text-gray">
                                    <i class="ti-trash"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        <!-- Modal START-->
                        <div class="modal fade" id="modal-lg{{ $stt }}">
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
                        </div>
                        <!-- Modal END-->
                        @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        {{ $room_type->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script>
        $(document).on('click', '#btn_delete', function (event) {
            event.preventDefault();

            var id = $(this).data('id');

            swal({
                title: "Bạn có chắc muốn xóa?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Không",
                confirmButtonText: "Có"
            }, function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url: '/admin/room_type/' + id,
                    success: function(res) {
                        //console.log(res);
                        toastr.success('Xóa loại phòng thành công !');
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    },
                    error: function error(xhr, ajaxOptions, thrownError) {
                        // toastr.error(thrownError);
                    }
                });
            });
        })
    </script>
@endsection
