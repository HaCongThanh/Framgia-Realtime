<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Framgia - Quản lý khách sạn</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('img/icon.png') }}">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/pace-theme-minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/perfect-scrollbar.min.css') }}" /> 

    <!-- page css -->
    @yield('style')

    <!-- core css -->
    <link href="{{ asset('bower_components/lib_booking/lib/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/admin/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/admin/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/admin/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lib_booking/lib/admin/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/user/css/bootstrap-datepicker.min.css')}}">

    <style type="text/css">
        .side-nav-folded .header .header-container .nav-logo > a .logo-dark{
            background-image: url({{ asset('/img/icon.png') }}) !important;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
<div class="app header-default side-nav-dark">
    <div class="layout">
        <!-- Header START -->
        <div class="header navbar">
            <div class="header-container">
                <div class="nav-logo">
                    <a href="{{ route('dashboard') }}">
                        <div class="logo logo-dark" style="background-image: url({{ asset('/img/logo.png') }});"></div>
                        <div class="logo logo-white" style="background-image: url({{ asset('/img/framgia3.png') }});"></div>
                    </a>
                </div>
                <ul class="nav-left">
                    <li>
                        <a class="sidenav-fold-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                        <a class="sidenav-expand-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>
                    {{--<li class="search-box">
                        <a class="search-toggle" href="javascript:void(0);">
                            <i class="search-icon mdi mdi-magnify"></i>
                            <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                        </a>
                    </li>
                    <li class="search-input">
                        <input class="form-control" type="text" placeholder="Type to search...">
                        <div class="search-predict">
                            <div class="search-wrapper scrollable">
                                <div class="p-v-10">
                                        <span class="display-block m-v-5 p-h-20 text-gray">
                                            <i class="ti-file p-r-5"></i>
                                            <span>Files</span>
                                        </span>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="media-hover p-h-20">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-success">
                                                        <i class="mdi mdi-file-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Document.xls</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="media-hover p-h-20">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-info">
                                                        <i class="mdi mdi-file-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Mockup.doc</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="media-hover p-h-20">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-danger">
                                                        <i class="mdi mdi-file-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Document.pdf</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-h-20 border top"></div>
                                <div class="p-v-10">
                                        <span class="display-block m-v-5 p-h-20 text-gray">
                                            <i class="ti-user p-r-5"></i>
                                            <span>Members</span>
                                        </span>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Debra Stewart</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Jane Hunt</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-footer">
                                <span>You are Searching for '<b class="text-dark"><span class="serach-text-bind"></span></b>'</span>
                            </div>
                        </div>
                    </li>--}}
                </ul>
                <ul class="nav-right">
                    <li class="dropdown dropdown-animated scale-left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-apps"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-grid col-3 dropdown-lg">
                            <li>
                                <a href="#">
                                    <div class="text-center">
                                        <i class="mdi mdi-email-outline font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Email</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="text-center">
                                        <i class="mdi mdi-folder-outline font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Files</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="text-center">
                                        <i class="mdi mdi mdi-gauge font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Dashboard</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="text-center">
                                        <i class="mdi mdi-play-circle-outline font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Video</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="text-center">
                                        <i class="mdi mdi-image-filter font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Images</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="text-center">
                                        <i class="mdi mdi-image-filter-drama font-size-30 icon-gradient-success"></i>
                                        <p class="m-b-0">Cloud</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="notifications dropdown dropdown-animated scale-left">
                        <span class="counter notif-count">0</span>
                        <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                            <i data-count="0" class="mdi mdi-bell-ring-outline" id="count_notification"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-lg p-v-0">
                            <li class="p-v-15 p-h-20 border bottom text-dark">
                                <h5 class="m-b-0">
                                    <i class="mdi mdi-bell-ring-outline p-r-10"></i>
                                    <span>Notifications (<span class="notif-count">0</span>)</span>
                                </h5>
                            </li>
                            <li>
                                <ul class="list-media overflow-y-auto relative scrollable" id="note_notification" style="max-height: 300px">
                                    {{-- <li class="list-item border bottom">
                                        <a href="javascript:void(0);" class="media-hover p-15">
                                            <div class="media-img">
                                                <div class="icon-avatar bg-success">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="info">
                                                    <span class="title">
                                                        New User Registered
                                                    </span>
                                                <span class="sub-title">12 min ago</span>
                                            </div>
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>
                            <li class="p-v-15 p-h-20 text-center">
                                <span>
                                    <a href="#" class="text-gray">Check all notifications <i class="ei-right-chevron p-l-5 font-size-10"></i></a>
                                </span>
                            </li>
                        </ul>
                    </li>
                    <li class="user-profile dropdown dropdown-animated scale-left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="profile-img img-fluid" src="@if(empty(Auth::user()->avatar)) {{ url('img/avatar-5.png') }} @else {{ url('images/avatar/' . Auth::user()->avatar) }} @endif" alt="" style="width: 40px; height: 40px;">
                        </a>
                        <ul class="dropdown-menu dropdown-md p-v-0">
                            <li>
                                <ul class="list-media">
                                    <li class="list-item p-15">
                                        <div class="media-img">
                                            <img src="@if(empty(Auth::user()->avatar)) {{ url('img/avatar-5.png') }} @else {{ url('images/avatar/' . Auth::user()->avatar) }} @endif" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title text-semibold">{{ Auth::user()->name }}</span>
                                            <span class="sub-title">{{ Auth::user()->email }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            {{--<li>
                                <a href="#">
                                    <i class="ti-settings p-r-10"></i>
                                    <span>Setting</span>
                                </a>
                            </li>--}}
                            <li>
                                <a href="{{ route('profile.show', Auth::user()->id) }}">
                                    <i class="ti-user p-r-10"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#">
                                    <i class="ti-email p-r-10"></i>
                                    <span>Inbox</span>
                                    <span class="badge badge-pill badge-success pull-right">2</span>
                                </a>
                            </li> --}}
                            <li>
                                <a class="sign-in" href="{{ route('user.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="ti-power-off p-r-10"></i>
                                    {{ __('messages.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="dropdown dropdown-animated scale-left">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('messages.language') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{!! route('locale', ['en']) !!}">{{ __('messages.english') }}</a>
                            <a class="dropdown-item" href="{!! route('locale', ['vi']) !!}">{{ __('messages.vietnamese') }}</a>
                        </div>
                    </li> --}}
                    <li>
                        <a class="dropdown-item" href="{!! route('locale', ['vi']) !!}" title="{{ __('messages.vietnamese') }}">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2000px-Flag_of_Vietnam.svg.png" width="25" height="15">
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{!! route('locale', ['en']) !!}" title="{{ __('messages.english') }}">
                            <img src="http://themes.webspixel.com/tenis/img/2.png">
                        </a>
                    </li>
                    <li class="m-r-10">
                        <a class="quick-view-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-format-indent-decrease"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header END -->

        <!-- Side Nav START -->
        <div class="side-nav expand-lg">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <li class="side-nav-header">
                        <span>Framgia Hotel</span>
                    </li>
                    <li class="nav-item dropdown open">
                        <a class="dropdown-toggle" href="{{ route('dashboard') }}">
                                <span class="icon-holder">
                                    <i class="mdi mdi-gauge"></i>
                                </span>
                            <span class="title">Bảng điều khiển</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fa fa-home"></i>
                            </span>
                            <span class="title">{{ __('messages.room_types') }}</span>
                            <span class="arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('facilities.index') }}">{{ __('messages.facility') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('room-types.index') }}">{{ __('messages.room_types_list') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="{{ route('room.index') }}">
                            <span class="icon-holder">
                                <i class="fa fa-hotel"></i>
                            </span>
                            <span class="title">{{ __('messages.room') }}</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="{{ route('customer-booking-logs.index') }}">
                            <span class="icon-holder">
                                <i class="fa fa-list-alt"></i>
                            </span>
                            <span class="title">{{ __('messages.room_lists') }}</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fa fa-list-ol"></i>
                            </span>
                            <span class="title">{{ __('messages.post') }}</span>
                            <span class="arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('categories.index') }}">{{ __('messages.category') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}">{{ __('messages.posts') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fa fa-vcard"></i>
                            </span>
                            <span class="title">{{ __('messages.user') }}</span>
                            <span class="arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('users.index') }}">{{ __('messages.users') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('customers.index') }}">{{ __('messages.customer') }}</a>
                            </li>
                        </ul>
                    </li>
                    @if (Entrust::hasRole('super-admin'))
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fa fa-vcard"></i>
                            </span>
                            <span class="title">{{ __('messages.system_custom') }}</span>
                            <span class="arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('roles.index') }}">{{ __('messages.roles') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('permissions.index') }}">{{ __('messages.permission') }}</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
            <!-- Quick View START -->
            <div class="quick-view">
                <ul class="quick-view-tabs nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#config" role="tab" data-toggle="tab">
                            <span>Config</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#quick-view-chat" role="tab" data-toggle="tab">
                            <span>Chat</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#activity" role="tab" data-toggle="tab">
                            <span>Activity</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content scrollable">
                    <!-- config START -->
                    <div id="config" role="tabpanel" class="tab-pane fade in active show">
                        <div class="theme-configurator p-20">
                            <div class="m-v-20 border bottom">
                                <p class="text-dark text-semibold m-b-0">Solid Header</p>
                                <p class="m-b-15">Config header background (solid)</p>
                                <div class="theme-selector p-b-20">
                                    <label>
                                        <input type="radio" value="default" name="header-theme">
                                        <span class="theme-color bg-white border"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="primary" name="header-theme">
                                        <span class="theme-color bg-primary"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="info" name="header-theme">
                                        <span class="theme-color bg-info"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="success" name="header-theme">
                                        <span class="theme-color bg-success"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="warning" name="header-theme">
                                        <span class="theme-color bg-warning"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="danger" name="header-theme">
                                        <span class="theme-color bg-danger"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="dark" name="header-theme">
                                        <span class="theme-color bg-dark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-v-15 border bottom">
                                <p class="text-dark text-semibold m-b-0">Gradient Header</p>
                                <p class="m-b-15">Config header background (gradient)</p>
                                <div class="theme-selector p-b-15">
                                    <label>
                                        <input type="radio" value="primary-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-primary"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="info-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-info"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="success-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-success"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="warning-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-warning"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="danger-gradient" name="header-theme">
                                        <span class="theme-color bg-gradient-danger"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-v-15 border bottom">
                                <p class="text-dark text-semibold m-b-0">Side Nav Color</p>
                                <p class="m-b-15">Config side nav background</p>
                                <div class="theme-selector p-b-15">
                                    <label>
                                        <input type="radio" value="default" name="side-nav-color">
                                        <span class="theme-color bg-white border"></span>
                                    </label>
                                    <label>
                                        <input type="radio" value="dark" name="side-nav-color">
                                        <span class="theme-color bg-dark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="m-v-15">
                                <p class="text-dark text-semibold m-b-0">RTL</p>
                                <p class="m-b-15">Toggle right to left</p>
                                <div class="theme-selector p-b-15">
                                    <div class="switch checkbox-inline">
                                        <input type="checkbox" name="rtl-toogle" id="rtl-toogle">
                                        <label for="rtl-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- config END -->
                    <!-- chat START -->
                    <div id="quick-view-chat" role="tabpanel" class="tab-pane fade">
                        <div class="quick-view-chat chat">
                            <div class="chat-user-list">
                                <div class="m-b-30 m-t-20">
                                    <h6 class="p-h-20 text-uppercase text-semibold">Online</h6>
                                    <ul class="list-media">
                                        <li class="list-item unread-msg">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status success"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title">Marshall Nichols</span>
                                                    <span class="sub-title">Here's the story of a man...</span>
                                                    <div class="float-item">
                                                        <span class="chat-counter">2</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item unread-msg">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status success"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title">Susie Willis</span>
                                                    <span class="sub-title">Do you see any Teletubbies...</span>
                                                    <div class="float-item">
                                                        <span class="chat-counter">1</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status success"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title">Debra Stewart</span>
                                                    <span class="sub-title">Oh my God. I didn't even...</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-b-30">
                                    <h6 class="p-h-20 text-uppercase text-semibold">Away</h6>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Francisco Vasquez</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Jane Hunt</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Ava Alexander</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Shane Ross</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-b-30">
                                    <h6 class="p-h-20 text-uppercase text-semibold">Busy</h6>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status busy"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Erin Gonzales</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="javascript:void(0);" class="conversation-toggler media-hover p-h-20">
                                                <div class="media-img">
                                                    <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                                    <span class="status busy"></span>
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10">Alan Mills</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="quick-view-conversation conversation">
                                <div class="conversation-wrapper">
                                    <div class="conversation-header">
                                        <span class="recipient">Susie Willis</span>
                                        <ul class="tools">
                                            <li>
                                                <a class="text-gray" href="javascript:void(0)">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-gray conversation-toggler" href="javascript:void(0)">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="quick-view-conversation-body conversation-body scrollable">
                                        <div class="msg datetime">
                                            <span>7:57PM</span>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Hey, what are you doing?</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Texting the most beautiful girl in the world.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Oh? How Cute</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Yup but she's not replying so texting you</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Okay</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg datetime">
                                            <span>8:05PM</span>
                                        </div>
                                        <div class="msg msg-recipient">
                                            <div class="user-img">
                                                <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                            </div>
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Bye</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>I'm just kidding..!!</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>Hello</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="msg msg-sent">
                                            <div class="bubble">
                                                <div class="bubble-wrapper">
                                                    <span>It's me..can you hear me..!!</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-footer">
                                        <button class="upload-btn">
                                            <i class="ti-face-smile"></i>
                                        </button>
                                        <input class="chat-input" type="text" placeholder="Type a message...">
                                        <button class="sent-btn">
                                            <i class="fa fa-send-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chat END -->
                    <!-- activity START -->
                    <div id="activity" role="tabpanel" class="tab-pane fade">
                        <div class="quick-view-activity">
                            <ul class="list-media m-t-20">
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Marshall Nichols</span>
                                            <span class="sub-title">has replied your mails.</span>
                                            <span class="sub-title font-size-11 p-t-5">8 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Susie Willis</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">12 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-primary">
                                                <i class="ti-settings"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">System Notifications</span>
                                            <span class="sub-title">Your account updated</span>
                                            <span class="sub-title font-size-11 p-t-5">2 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Erin Gonzales</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">3 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-info">
                                                <i class="mdi mdi-file-outline"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">New Attachment</span>
                                            <span class="sub-title">3 files has updated</span>
                                            <span class="sub-title font-size-11 p-t-5">5 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-success">
                                                <span>S</span>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">Suzanne Lynch</span>
                                            <span class="sub-title">has sent you a message.</span>
                                            <span class="sub-title font-size-11 p-t-5">9 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Riley Newman</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">10 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <div class="icon-avatar bg-warning">
                                                <span>FW</span>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <span class="title">Franklin Weaver</span>
                                            <span class="sub-title">has sent you a message.</span>
                                            <span class="sub-title font-size-11 p-t-5">10 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-item border bottom">
                                    <a href="javascript:void(0);" class="media-hover p-20">
                                        <div class="media-img">
                                            <img src="{{ url('assets/images/avatars/thumb-11.jpg') }}" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="title">Darryl Day</span>
                                            <span class="sub-title">commented on your post's</span>
                                            <span class="sub-title font-size-11 p-t-5">12 days ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- activity END -->
                </div>
            </div>
            <!-- Side Panel END -->

        @yield('content')

        <!-- Footer START -->
            <footer class="content-footer">
                <div class="footer">
                    <div class="copyright">
                        <span>Copyright © 2018 <b class="text-dark">Framgia</b>. All rights reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- Footer END -->
        </div>
        <!-- Page Container END -->
    </div>
</div>

{{--<script src={{ asset('bower_components/lib_booking/lib/user/js/jquery-2.2.0.min.js') }}></script>--}}
<script src="{{ asset('bower_components/lib_booking/lib/admin/js/vendor.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/admin/js/app.min.js') }}"></script>

<!-- page js -->
<script src="{{ asset('bower_components/lib_booking/lib/admin/js/Chart.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/admin/js/default.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/admin/js/pusher.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/admin/ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>

@yield('script')

<script type="text/javascript">
    var notificationsWrapper   = $('.notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    var notifications          = notificationsWrapper.find('ul.relative');

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: 'ap1',
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('NotifyNoteEvent');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('notification-note', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
            <li class="list-item border bottom active">
                <a href="javascript:void(0);" class="media-hover p-15">
                    <div class="media-img">
                        <div class="icon-avatar bg-success">
                            <i class="ti-user"></i>
                        </div>
                    </div>
                    <div class="info">
                            <span class="title">
                                `+data.name+`
                            </span>
                        <span class="sub-title">`+data.note+`</span>
                    </div>
                </a>
            </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
</script>

<script>
    $(function(){
        setTimeout(function(){
            $.ajax({
                url: '{{ route('admin.note_notification') }}',
                success:function(res){
                    if (res.array_note.length != 0) {
                        for (var i = 0; i < res.array_note.length; i++) {

                            $name = res.array_note[i]['name'];

                            if (res.array_note[i]['note'].length >= 36) {
                                $note = res.array_note[i]['note'].substr(0, 36) + ' . . .';
                            } else {
                                $note = res.array_note[i]['note'];
                            }

                            if (res.array_note[i]['avatar'] == null) {
                                $avatar = '/img/avatar-5.png';
                            } else {
                                $avatar = res.array_note[i]['avatar'];
                            }

                            $('#note_notification').append("<li class='list-item border bottom active'><a href='javascript:void(0);' class='media-hover p-15'><div class='media-img'><img src='" + $avatar + "' alt=''></div><div class='info'><span class='title'>" + $name + "</span><span class='sub-title'>" + $note + "</span></div></a></li>");

                        }
                    }

                    $('.notif-count').html(res.count_not_seen);

                    $('#count_notification').attr('data-count', res.count_not_seen);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // toastr.error(thrownError);
                }
            });
        }, 500);
    });
</script>

</body>
</html>
