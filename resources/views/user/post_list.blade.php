@extends('user.layouts.master')

@section('style')

@endsection

@section('content')
    
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Danh sách bài viết</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">Trang chủ</a></li>
                    <li class="active">Bài viết</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">

                    @if (!empty($posts))
                        @foreach ($posts as $post)
                            
                            <div class="blog-1">
                                <div class="blog-photo">
                                    <img src="{{ url('/images/posts/' . $post->image) }}" style="width: 1140px; height: 475px;" alt="blog" class="img-responsive">
                                    <div class="profile-user">
                                        <img src="{{ url('/img/avatar-5.png/') }}" alt="user">
                                    </div>
                                </div>

                                <div class="detail">
                                    <div class="post-meta clearfix">
                                        <ul>
                                            <li>
                                                <strong><a>{{ $post->users->name }}</a></strong>
                                            </li>
                                            <li class="mr-0"><span>{{ date(' d/m/Y', strtotime($post->created_at)) }}</span></li>
                                            {{-- <li class="fr mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                            <li class="fr"><a href="#"><i class="fa fa-calendar"></i></a>5k</li> --}}
                                        </ul>
                                    </div>

                                    <h3>
                                        <a href="{{ route('user.posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h3>

                                    {!! $post->description !!}<br>

                                    <a href="{{ route('user.posts.show', $post->id) }}" class="read-more-btn">Xem chi tiết...</a>
                                </div>
                            </div>

                        @endforeach
                    @endif

                    {{-- <div class="text-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li><a href="blog-right-sidebar.html">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="blog-left-sidebar.html">2</a></li>
                                <li><a href="blog-creative.html">3</a></li>
                                <li class="active"><a href="blog-full-width.html">4</a></li>
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
        </div>
    </div>

@endsection

@section('script')

@endsection
