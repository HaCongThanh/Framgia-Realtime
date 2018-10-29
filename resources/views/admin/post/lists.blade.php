@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.posts') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.posts') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-header border bottom">
                    <a href="{{ route('post.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> {{ __('messages.add') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('messages.id') }}</th>
                            <th scope="col">{{ __('messages.image') }}</th>
                            <th scope="col">{{ __('messages.posts_name') }}</th>
                            <th scope="col">{{ __('messages.categories') }}</th>
                            <th scope="col">{{ __('messages.user_write') }}</th>
                            <th scope="col">{{ __('messages.status') }}</th>
                            <th scope="col" style="text-align: center">{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ $key + $posts->firstItem() }}</td>
                            <td><img src="{{ asset('/images/posts/'.$post->image) }}" width="100"></td>
                            <td>{{ $post->title }}</td>

                            <td>
                                @foreach($post->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </td>
                            <td>
                                {{ $post->users->name }}
                            </td>
                            @if($post->status == 0)
                                <td class="text-center">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    {{--<label>{{ __('messages.uncheck') }}</label>--}}
                                </td>
                            @else
                                <td class="text-center">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    {{--<label>{{ __('messages.checked') }}</label>--}}
                                </td>
                            @endif
                            <td class="text-center font-size-18">
                                @if (Entrust::hasRole('super-admin'))
                                    <a href="/admin/post/{{ $post->id }}/edit" class="text-gray">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <a id="btn_delete" data-id="{{ $post->id }}" class="text-gray">
                                        <i class="ti-trash"></i>
                                    </a>
                                @elseif(Entrust::hasRole('user'))
                                    @if (Auth::user()->id == $post->users->id)
                                        <a href="/admin/post/{{ $post->id }}/edit" class="text-gray">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a id="btn_delete" data-id="{{ $post->id }}" class="text-gray">
                                            <i class="ti-trash"></i>
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script>
        $(document).on('click', '#btn_delete', function (event) {
            event.preventDefault();

            var id = $(this).data('id');

            swal({
                title: "Bạn có chắc muốn xóa?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Không",
                confirmButtonText: "Có"
            }, function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url: '/admin/post/' + id,
                    success: function(res) {
                        //console.log(res);
                        toastr.success('Xóa bài viết thành công !');
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    },
                    error: function error(xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            });
        })
    </script>
@endsection
