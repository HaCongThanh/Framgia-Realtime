@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.room_lists') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.list') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.customer_name') }}</th>
                            <th scope="col">{{ __('messages.date') }}</th>
                            <th scope="col">{{ __('messages.total_people') }}</th>
                            <th scope="col">{{ __('messages.total_room') }}</th>
                            <th scope="col">{{ __('messages.total_price') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php ($stt = 0)
                        @foreach ($lists as $key => $list)
                        <tr>
                            <td>{{ $key + $lists->firstItem() }}</td>
                            <td>{{ $list->users->name }}</td>
                            <td>{{ $list->start_date }} / {{ $list->end_date }}</td>
                            <td>{{ $list->total_number_people }}</td>
                            <td>{{ $list->total_number_room }}</td>
                            <td>{{ number_format($list->total_money) }}</td>
                            <td class="text-center font-size-18">
                                <a href="" data-toggle="modal" data-target="#modal-lg{{ $stt+=1 }}" class="text-gray m-r-15" title="{{ __('messages.view') }}"><i class="ti-eye"></i></a>
                            </td>
                        </tr>
                        <!-- Modal START-->
                        <div class="modal fade" id="modal-lg{{ $stt }}">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>{{ __('messages.information') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-15 m-v-40">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <p>{{ __('messages.customer_name') }}: {{ $list->users->name }}</p>
                                                    <p>{{ __('messages.date_start') }}: {{ $list->start_date }}</p>
                                                    <p>{{ __('messages.date_finish') }}: {{ $list->end_date }}</p>
                                                    <p>{{ __('messages.total_people') }}: {{ $list->total_number_people }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ __('messages.rooms_stt') }}: </p>
                                                    <p>{{ __('messages.room_type') }}: </p>
                                                    <p>{{ __('messages.floor') }}: </p>
                                                    <p>{{ __('messages.total_price') }}: {{ number_format($list->total_money) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-border">
                                        <div class="text-right">
                                            <button class="btn btn-success" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal END-->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection