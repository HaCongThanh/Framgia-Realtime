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

<div class="clearfix" style="text-align: center;">{{ $room_types->links() }}</div>
