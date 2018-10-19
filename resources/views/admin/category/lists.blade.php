@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.category') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.categories') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('category.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.categories') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td scope="row">{!! $key + $categories->firstItem() !!}</td>
                            <td>{!! $category -> name !!}</td>
                            <td class="text-center font-size-18">
                                {!! Form::open(['route' => ['category.edit', $category->id], 'method' => 'GET']) !!}
                                    {!! Form::button('<i class="ti-pencil"></i>', ['class' => 'text-gray', 'type' => 'submit', 'title' => __('messages.delete')]) !!}
                                {!! Form::close() !!}
                                {!! Form::open(['route' => ['category.destroy',$category->id], 'method' => 'DELETE']) !!}
                                    {!! Form::button('<i class="ti-trash"></i>', ['class' => 'text-gray', 'type' => 'submit', 'title' => __('messages.delete')]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
