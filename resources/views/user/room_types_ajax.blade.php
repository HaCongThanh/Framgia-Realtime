<div class="clearfix" style="text-align: center;">{{ $room_types->links() }}</div>

@if (!empty($room_types))
    @foreach ($room_types as $room_type)
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="{{ $room_type->id }}">
            <div class="hotel-box">
                <div class="header clearfix">
                    <img src="{{ url('/images/rooms/' . $room_type->images->first->filename['filename']) }}" alt="img-1" class="img-responsive" style="width: 360px; height: 240px;">
                </div>

                <div class="detail clearfix">
                    <div class="pr">
                        VNĐ {{ number_format($room_type->price) }}<sub>/Đêm</sub>
                        {{-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </div> --}}
                    </div>
                    <h3>
                        <a href="{{ route('user.rooms.show', $room_type->id) }}">{{ $room_type->name }}</a>
                    </h3>
                    <h5 class="location">
                        <a href="{{ route('user.rooms.show', $room_type->id) }}">
                            <i class="fa fa-map-marker"></i>Framgia Hotel,
                        </a>
                    </h5>

                    @php
                        if (strlen($room_type->description) > 436) {
                            echo trim(substr($room_type->description, 0, 430)) . ' . . .';
                        } else {
                            echo $room_type->description;
                        }
                    @endphp
                </div>
            </div>
        </div>

    @endforeach
@endif
