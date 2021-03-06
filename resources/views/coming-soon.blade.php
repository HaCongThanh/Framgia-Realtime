<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Framgia - Hotels | Coming Soon</title>
    <!-- Stylesheets -->
    <link href="{{ asset('bower_components/lib_booking/lib/comingsoon/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/comingsoon/css/revolution-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/comingsoon/css/flipclock.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/comingsoon/css/style.css') }}" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="{{ asset('bower_components/lib_booking/lib/comingsoon/css/bootstrap-margin-padding.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/comingsoon/css/responsive.css') }}" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper">

        <div class="preloader"></div>

        <section class="parallax-section theme-overlay overlay-deep-white pt-200" style="background-image: url({{ asset('/img/comingsoon.jpg')}});">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-8 col-md-offset-2 text-center pt-180 pb-180">
                        <h1 class="font-64 mb-50">Coming Soon</h1>
                        <div class="clock ml-70" style="margin:2em;"></div>
                        <div class="message"></div>
                        <p class="font-16">Xin lỗi.... Hệ thống website đang trong quá trình xây dựng.<br>Hệ thống đặt phòng khách sạn sẽ sớm hoàn thiện....</p>
                    </div>
                </div>
            </div>
        </section>
        
    </div>

    <div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>

    <script src="{{ asset('bower_components/lib_booking/lib/comingsoon/js/jquery.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/comingsoon/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/comingsoon/js/revolution.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/comingsoon/js/flipclock.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/comingsoon/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/comingsoon/js/script.js') }}"></script>

    <script type="text/javascript">
        var clock;

        $(document).ready(function() {
            var clock;
            clock = $('.clock').FlipClock({
                clockFace: 'DailyCounter',
                autoStart: false,
                callbacks: {
                    stop: function() {
                        $('.message').html('The clock has stopped!')
                    }
                }
            });

            var countDownDate = new Date("Oct 17, 2018 08:00:00").getTime();
            var now = new Date().getTime();
            var distance = (countDownDate / 1000) - (now / 1000);
                    
            clock.setTime(distance);
            clock.setCountdown(true);
            clock.start();
        });
    </script>

</body>
</html>