@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.posts') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('post') }}">{{ __('messages.posts') }}</a>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('post_create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.image') }}</th>
                            <th scope="col">{{ __('messages.posts_name') }}</th>
                            <th scope="col">{{ __('messages.categories') }}</th>
                            <th scope="col">{{ __('messages.status') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td scope="row">{{ $post->image }}</td>
                            <td>{{ $post->name }}</td>
                            <td>Mark</td>
                            <td>
                                <div class="switch d-inline m-r-10">
                                    {{ Form::checkbox('status', 'value', true) }}
                                    {{--<input type="checkbox" id="switch-1" checked="">--}}
                                    <label for="switch-1"></label>
                                </div>
                            </td>
                            <td class="text-center font-size-18">
                                <a href="{{ route('post_edit', $post->id) }}" class="text-gray m-r-15" title="{{ __('messages.edit') }}"><i class="ti-pencil"></i></a>
                                <a href="" class="text-gray" title="{{ __('messages.delete') }}"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
