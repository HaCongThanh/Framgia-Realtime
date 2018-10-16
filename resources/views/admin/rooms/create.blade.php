@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.rooms_add') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <a class="breadcrumb-item" href="{{ route('room') }}">{{ __('messages.list') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.rooms_add') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'room_create', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-md-6 room">
                            <div class="form-group">
                                {!! Form::label('floor', __('messages.floor'), ['class' => 'control-label']) !!}
                                {!! Form::text('floor', null, ['class' => 'form-control form-control-sm', 'placeholder' => __('messages.floor_stt')]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('room_type', __('messages.room_type'), ['class'=>'control-label']) !!}
                                {!! Form::select('room_type select', $room_types, '', ['class' => 'form-control', 'id' => 'type', 'data-depenment' => 'state']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 room">
                            <div class="form-group">
                                {!! Form::label('max_people', __('messages.people'), ['class' => 'control-label']) !!}
                                {!! Form::select('max_people', ['L' => 'Large', 'S' => 'Small'], '',['class' => 'form-control', 'id' => 'people', 'data-depenment' => 'state']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', __('messages.price'), ['class'=>'control-label']) !!}
                                {!! Form::select('price', ['L' => 'Large', 'S' => 'Small'], '',['class'=>'form-control', 'id' => 'price', 'data-depenment' => 'state']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            {!! Form::submit(__('messages.add'), ['class'=>'btn btn-info btn-float btn-outline']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var depenment = $(this).data('depenment');
                    var _token = $('input[name = "_token"]').val();

                    $.ajax({
                        url: "{{ route('room_create') }}",
                        method: "POST",
                        data: {select: select, value: value, _token: _token, depenment: depenment},
                        success:function (result) {
                            $('#'+depenment).html(result);
                        }
                    })
                }
            });
            $('#type').change(function(){
                $('#people').val('');
            });

            $('#type').change(function(){
                $('#price').val('');
            });
        });
        // $(document).ready(function() {
        //     $('select[id="type"]').on('change', function() {
        //         var stateID = $(this).val();
        //         if(stateID) {
        //             $.ajax({
        //                 url: '/room/create/'+stateID,
        //                 type: "GET",
        //                 dataType: "json",
        //                 success:function(data) {
        //
        //
        //                     $('select[id="people"]').empty();
        //                     $.each(data, function(key, value) {
        //                         $('select[id="people"]').append('<option value="'+ key +'">'+ value +'</option>');
        //                     });
        //
        //
        //                 }
        //             });
        //         }else{
        //             $('select[name="city"]').empty();
        //         }
        //     });
        // });
    </script>
@endsection
