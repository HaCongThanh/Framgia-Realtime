@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/jasny-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/selectize.default.css') }}" />
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.posts_add') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('post') }}">{{ __('messages.posts') }}</a>
                        <span class="breadcrumb-item active">{{ __('messages.add') }}</span>
                    </nav>
                </div>
            </div>
            <div class="card">

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                <div class="card-body">
                    {!! Form::open(['route' => 'post_create', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('title', __('messages.posts_name'), ['class' => 'control-label']) !!}
                            {!! Form::text('title', "", ['class' =>' form-control form-control-sm', 'id' => 'title', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', __('messages.slug'), ['class' => 'control-label']) !!}
                            {!! Form::text('slug', "", ['class' => 'form-control form-control-sm', 'id' => 'slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', __('messages.categories'), ['class' => 'control-label']) !!}
                            {!! Form::select('category', $categories, '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', __('messages.description'), ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('messages.description_text'), 'rows' => "3"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', __('messages.content'), ['class'=>'control-label']) !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => __('messages.content_text'), 'rows' => "3", 'id' => 'editor1']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', __('messages.image'), ['class' => 'control-label']) !!}
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">{{ __('messages.file') }}</span>
                                        <span class="fileinput-exists">{{ __('messages.change') }}</span>
                                        {!! Form::file('image') !!}
                                    </span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', __('messages.status'), ['class'=>'control-label']) !!}
                            <div class="m-t-15">
                                <div class="select-box">
                                    {{ Form::select('status', [1 => trans('messages.checked'), 0 => trans('messages.uncheck')], null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        {!! Form::submit(__('messages.add'), ['class'=>'btn btn-info btn-float btn-outline']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/selectize.min.js') }}"></script>
    <script language="javascript">
        function ChangeToSlug()
        {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');

            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');

            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");

            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');

            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');

            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
