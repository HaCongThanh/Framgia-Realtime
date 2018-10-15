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
                            <td><img src="{{ asset('/public/images/post/'.$post->image) }}" width="100"></td>
                            <td>{{ $post->title }}</td>

                            <td>
                                {{--{{ $post->categories[0]->name }}--}}
                            </td>
                            @if($post->status == 0)
                                <td>
                                    <div class="switch d-inline m-r-10">
                                        <input type="checkbox" id="switch-3" disabled="">
                                        <label for="switch-3"></label>
                                    </div>
                                    <label>{{ __('messages.uncheck') }}</label>
                                </td>
                            @else
                                <td>
                                    <div class="switch d-inline m-r-10">
                                        <input type="checkbox" id="switch-4" disabled="" checked="">
                                        <label for="switch-4"></label>
                                    </div>
                                    <label>{{ __('messages.checked') }}</label>
                                </td>
                            @endif
                            <td class="text-center font-size-18">
                                {!! Form::open(['route' => ['post_edit',$post->id], 'method' => 'GET']) !!}
                                    {!! Form::button('<i class="ti-pencil"></i>', ['class' => 'text-gray', 'type' => 'submit', 'title' => __('messages.edit')]) !!}
                                {!! Form::close() !!}
                                {!! Form::open(['route' => ['post_edit',$post->id], 'method' => 'POST']) !!}
                                    {!! Form::button('<i class="ti-trash"></i>', ['class' => 'text-gray', 'type' => 'submit', 'title' => __('messages.delete')]) !!}
                                {!! Form::close() !!}
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
