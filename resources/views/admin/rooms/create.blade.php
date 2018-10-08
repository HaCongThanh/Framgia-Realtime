@extends('admin.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Thêm phòng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <a class="breadcrumb-item" href="/admin/rooms">Danh sách phòng</a>
                        <span class="breadcrumb-item active">Thêm phòng</span>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Số phòng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Nhập số phòng">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tầng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Số tầng">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Loại phòng: </label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Số người/phòng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Giá phòng: </label>
                                <input type="text" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-float btn-outline">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection