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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page">

                    @include('user.room_list_ajax')

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
    <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getProducts(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getProducts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });

        function getProducts(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('.page').html(data);
                location.hash = page;
            }).fail(function () {
                alert('Products could not be loaded.');
            });
        }
    </script>
@endsection
