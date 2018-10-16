@extends('user.layouts.master')

@section('style')

@endsection

@section('content')
    
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Danh sách phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">Trang chủ</a></li>
                    <li class="active">Danh sách phòng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <div class="rooms-section content-area">
        <div class="container">
            <div class="main-title">
                <h1>Các phòng tốt nhất</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @if (!empty($room_types))
                        @foreach ($room_types as $room_type)
                            
                            <div class="hotel-box-list">
                                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                                    <img src="{{ url('/images/rooms/' . $room_type->images->first->filename['filename']) }}" alt="rooms-col-1" class="img-responsive">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                                    <div class="heading">
                                        <div class="title pull-left">
                                            <h3>
                                                <a href="{{ route('user.rooms.show', $room_type->id) }}">{{ $room_type->name }}</a>
                                            </h3>
                                        </div>
                                        <div class="price pull-right">
                                            {{ number_format($room_type->price) }} VNĐ / Đêm
                                        </div>
                                    </div>

                                    {!! $room_type->description !!}
                                    <div class="row">
                                        <div class="fecilities">

                                            @if (!empty($room_type->facilities))
                                                @foreach ($room_type->facilities as $facility)

                                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                                        <span><i class="flaticon-bed" style="color: #3ac4fa;"></i> {{ $facility->name }}</span>
                                                    </div>

                                                @endforeach
                                            @endif

                                        </div>
                                    </div>

                                    <br>
                                    
                                    <div class="hiddenmt-15">
                                        <a href="{{ route('user.rooms.show', $room_type->id) }}" class="read-more-btn">Xem chi tiết...</a>
                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
            </div>

            {{-- <div class="text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li class="active"><a href="rooms-col-1.html">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="rooms-col-2.html">2</a></li>
                        <li><a href="rooms-col-3.html">3</a></li>
                        <li><a href="rooms-col-4.html">4</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> --}}

        </div>
    </div>

@endsection

@section('script')

@endsection
