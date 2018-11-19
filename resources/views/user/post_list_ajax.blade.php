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

<div class="clearfix" style="text-align: center;">{{ $posts->links() }}</div>
