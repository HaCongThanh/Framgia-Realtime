@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Sửa danh mục</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Category</a>
                        <span class="breadcrumb-item active">Edit</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label">Tên danh mục: </label>
                        <input type="text" class="form-control form-control-sm" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-info btn-float btn-outline">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection