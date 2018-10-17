@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}" />
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.user_list') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.list') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="#" class="btn btn-success"><i class="ti-plus"></i>{{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                            <tr>
                                <th>{{ __('messages.user_name') }}</th>
                                <th>{{ __('messages.gender') }}</th>
                                <th>{{ __('messages.date_of_birth') }}</th>
                                <th>{{ __('messages.phone') }}</th>
                                <th>{{ __('messages.email') }}</th>
                                <th>{{ __('messages.address') }}</th>
                                <th>{{ __('messages.role') }}</th>
                                <th>{{ __('messages.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">Marshall Nichols</span>
                                                    <span class="sub-title">ID 870</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Nam</td>
                                    <td>08 May 2018</td>
                                    <td>0123456789</td>
                                    <td>Example@gmail.com</td>
                                    <td>Hà Nội</td>
                                    <td>
                                        <span class="badge badge-pill badge-gradient-success">Admin</span>
                                        <span class="badge badge-pill badge-warning">Nhân viên</span>
                                    </td>
                                    <td class="text-center font-size-18">
                                        <a href="#" class="text-gray"title="{{ __('messages.edit') }}"><i class="ti-pencil"></i></a>
                                        <a href="#" class="text-gray" title="{{ __('messages.delete') }}"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
@endsection