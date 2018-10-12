@extends('user.layouts.app')

@section('style')

@endsection

@section('content')

    <!-- Content bg area start -->
    <div class="contact-bg overview-bgi" style="background: rgba(0, 0, 0, 0.04) url({{ asset('/img/comingsoon.jpg')}}) top left repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-content-box">
                        <!-- logo -->
                        <a href="index.html" class="clearfix alpha-logo">
                            <img src="{{ url('/img/framgia3.png') }}" alt="white-logo">
                        </a>

                        <div class="details">
                            <h3>Tạo tài khoản</h3>
                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf

                                <div class="form-group">
                                    <input id="name" type="text" name="name" class="input-text form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus placeholder="Họ và tên">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" name="email" class="input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required placeholder="Địa chỉ Email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" name="password" class="input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mật khẩu" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" name="password_confirmation" class="input-text form-control" placeholder="Nhập lại Mật khẩu" required>
                                </div>

                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block">Đăng ký</button>
                                </div>
                            </form>
                        </div>

                        <div class="footer">
                            <span>
                                Bạn đã có tài khoản? <a href="{{ route('user.login_form') }}">Đăng nhập ở đây</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content bg area end -->

@endsection

@section('script')

@endsection
