@extends('user.layouts.master')

@section('style')

@endsection

@section('content')
    
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Chi tiết bài viết</h1>
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
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="blog-1 mb-50">
                        <div class="blog-photo">
                            <img src="{{ url('/images/posts/' . $post->image) }}" alt="blog-big" class="img-responsive">
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
                                <a>{{ $post->title }}</a>
                            </h3>
                            <blockquote>
                                {!! $post->description !!}
                            </blockquote>
                            {!! $post->content !!}
                            <br>

                            {{-- <div class="row clearfix t-s">
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    <div class="tags-box hidden-mb-10">
                                        <h2>Tags</h2>
                                        <ul class="tags">
                                            <li><a href="#">Rooms</a></li>
                                            <li><a href="#">Promotion</a></li>
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                    <div class="blog-share">
                                        <h2>Share</h2>
                                        <ul class="social-list">
                                            <li>
                                                <a href="#" class="facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="google">
                                                    <i class="fa fa-google"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="linkedin">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="rss">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>

                    <!-- Comments section start -->
                    {{-- <div class="comments-section">
                        <div class="main-title-2">
                            <h1><span>Comments </span> Section</h1>
                        </div>

                        <ul class="comments">
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <a href="#">
                                                    <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                                </a>
                                            </div>

                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <div class="comment-meta-author">
                                                        Jane Doe
                                                    </div>

                                                    <div class="comment-meta-reply">
                                                        <a href="#">Reply</a>
                                                    </div>

                                                    <div class="comment-meta-date">
                                                        <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="comment-body">
                                                    <div class="comment-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment comment-mrg-bdr-nane">
                                            <div class="comment-author">
                                                <a href="#">
                                                    <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                                </a>
                                            </div>

                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <div class="comment-meta-author">
                                                        Jane Doe
                                                    </div>

                                                    <div class="comment-meta-reply">
                                                        <a href="#">Reply</a>
                                                    </div>

                                                    <div class="comment-meta-date">
                                                        <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="comment-body">
                                                    <div class="comment-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- Comments section end -->

                    <!-- Contact 1 start -->
                    {{-- <div class="contact-1">
                        <div class="main-title-2">
                            <h1> <span>Leave</span> a Comment</h1>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="contact-form">
                                    <form id="contact_form" action="https://storage.googleapis.com/themevessel-items/hotel-alpha/index.html" method="GET" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group fullname">
                                                    <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group enter-email">
                                                    <input type="email" name="email" class="input-text" placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group subject">
                                                    <input type="text" name="subject" class="input-text" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group number">
                                                    <input type="text" name="phone" class="input-text" placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                                <div class="form-group message">
                                                    <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                                <div class="send-btn form-group">
                                                    <button type="submit" class="btn-md btn-theme">Send Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <!-- Contact-1 end -->
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar">
                        <!-- Search box start -->
                        {{-- <div class="sidebar-widget search-box">
                            <form class="form-inline form-search" method="GET">
                                <div class="form-group">
                                    <label class="sr-only" for="textsearch3">Search</label>
                                    <input type="text" class="form-control" id="textsearch3" placeholder="Search">
                                </div>
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div> --}}
                        <!-- Search box end -->

                        <!-- Recent nesw start -->
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Bài viết mới nhất</h1>
                            </div>

                            @if (!empty($diff_posts))
                                @foreach ($diff_posts as $diff_post)
                                    
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="{{ url('/images/posts/' . $diff_post->image) }}" alt="small-img" style="width: 80px; height: 80px;">
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading">
                                                <a href="{{ route('user.posts.show', $diff_post->id) }}">{{ $diff_post->title }}</a>
                                            </h3>
                                            <p>{{ date('d/m/Y', strtotime($diff_post->created_at)) }}</p>
                                            <h5>{{ $diff_post->users->name }}</h5>
                                        </div>
                                    </div>

                                @endforeach
                            @endif

                        </div>
                        <!-- Recent nesw end -->

                        <!-- Category posts start -->
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Danh mục</h1>
                            </div>
                            <ul class="list-unstyled list-cat">

                                @if (!empty($post->categories))
                                    @foreach ($post->categories as $category)
                                        
                                        <li><a>{{ $category->name }}</a></li>
                                        {{-- <li><a href="#">{{ $category->name }} <span>(45)</span></a></li> --}}

                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <!-- Category posts end -->

                        <!-- Archives start -->
                        {{-- <div class="sidebar-widget archives">
                            <div class="main-title-2">
                                <h1>Archives</h1>
                            </div>
                            <ul class="list-unstyled">
                                <li><a href="#">July 2017</a></li>
                                <li><a href="#">August 2017</a></li>
                                <li><a href="#">September 2017</a></li>
                                <li><a href="#">October 2017</a></li>
                                <li><a href="#">November 2017</a></li>
                            </ul>
                        </div> --}}
                        <!-- Archives end -->

                        <!-- tags box start -->
                        {{-- <div class="sidebar-widget tags-box">
                            <div class="main-title-2">
                                <h1>Tags</h1>
                            </div>
                            <ul class="tags">
                                <li><a href="#">Rooms</a></li>
                                <li><a href="#">Promotion</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Audio</a></li>
                            </ul>
                        </div> --}}
                        <!-- tags box end -->

                        <!-- Social media start -->
                        <div class="social-media sidebar-widget clearfix">
                            <div class="main-title-2">
                                <h1>Social Media</h1>
                            </div>

                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/hacongthanh.t" target="blank" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social media end -->

                        <!-- Recent comments start -->
                        {{-- <div class="sidebar-widget recent-comments">
                            <div class="main-title-2">
                                <h1>Recent comments</h1>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="img/avatar/avatar-1.jpg" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet,conser adipiscing elit.Etiamrisus tortor, accumsan,</p>
                                    <span>By <b> John Doe</b></span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="img/avatar/avatar-2.jpg" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet,conser adipiscing elit.Etiamrisus tortor,</p>
                                    <span>By <b>Karen Paran</b></span>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Recent comments end -->

                        <!-- Latest tweet start -->
                        {{-- <div class="sidebar-widget latest-tweet">
                            <div class="main-title-2">
                                <h1>Latest Tweet</h1>
                            </div>
                            <p><a href="#">@Lorem ipsum dolor</a> sit amet, conser adipiscing elit. Aenean id dignissim justo. Maecenas urna lacus, bibendum </p>
                            <p>@Lorem ipsum dolor<a href="#">sit amet, conser</a> adipiscing elit. Aenean id dignissim justo. Maecenas urna lacus, bibendum quis orci </p>
                        </div> --}}
                        <!-- Latest tweet end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
