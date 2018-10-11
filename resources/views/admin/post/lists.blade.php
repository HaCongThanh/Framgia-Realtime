@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Danh sách bài viết</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="#">Tables</a>
                        <span class="breadcrumb-item active">Basic Table</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header border bottom">
                    <a href="/admin/post/create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Bài viết</th>
                            <th scope="col"></th>
                            <th scope="col">Danh mục</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center font-size-18">
                                <a href="/admin/post/edit" class="text-gray m-r-15" title="Sửa"><i class="ti-pencil"></i></a>
                                <a href="#" class="text-gray" title="Xóa"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection