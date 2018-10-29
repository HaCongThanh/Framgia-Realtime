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
                <h2 class="header-title">{{ __('messages.facility') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <span class="breadcrumb-item active">{{ __('messages.facilities') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                @if (Entrust::can('add-facilities'))
                <div class="card-header border bottom">
                    <a href="{{ route('facility.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.facility') }}</th>
                            @if (Entrust::can(['add-facilities', 'edit-facilities', 'delete-facilities']))
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($facilities as $key => $facility)
                            <tr>
                                <td scope="row">{!! $key + $facilities->firstItem() !!}</td>
                                <td>{!! $facility -> name !!}</td>
                                @if (Entrust::can(['edit-facilities', 'delete-facilities']))
                                <td class="text-center font-size-18">
                                    <a href="/admin/post/{{ $facility->id }}/edit" class="text-gray">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <a id="btn_delete" data-id="{{ $facility->id }}" class="text-gray">
                                        <i class="ti-trash"></i>
                                    </a>
                                </td>
                                @endif
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
                    url: '/admin/facility/' + id,
                    success: function(res) {
                        //console.log(res);
                        toastr.success('Xóa tiện nghi thành công !');
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    },
                    error: function error(xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            });
        })
    </script>
@endsection
