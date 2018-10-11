@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Tạo mới bài viết</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Posts</a>
                        <span class="breadcrumb-item active">Add</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label">Tên bài viết: </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Tên bài viết">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Danh mục</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả: </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nội dung: </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-float btn-outline">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection