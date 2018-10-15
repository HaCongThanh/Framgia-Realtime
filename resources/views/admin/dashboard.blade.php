@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Customer Overview</h5>
                            <div class="float-right">
                                <ul class="list-inline d-none d-sm-block">
                                    <li class="m-r-20">
                                        <span class="status success"></span>
                                        <span class="text-semibold m-l-5">Sales</span>
                                    </li>
                                    <li>
                                        <span class="status info"></span>
                                        <span class="text-semibold m-l-5">Products</span>
                                    </li>
                                    <li>
                                        <span class="status primary"></span>
                                        <span class="text-semibold m-l-5">Costs</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-t-10">
                                <canvas class="chart" id="customer-overview-chart" style="height: 320px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Your Sales</h4>
                            <div class="card-toolbar">
                                <ul>
                                    <li>
                                        <a class="text-gray" href="javascript:void(0)">
                                            <i class="mdi mdi-dots-vertical font-size-20"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="m-t-10">
                                <span class="status gradient info"></span>
                                <span class="m-b-10 font-size-16 m-l-5">Online Sales</span>
                                <div class="float-right">
                                    <b class=" font-size-18 text-dark">15,872 </b>
                                    <span>USD</span>
                                </div>
                                <div class="progress m-t-15">
                                    <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="m-t-60">
                                <span class="status gradient success"></span>
                                <span class="m-b-10 font-size-16 m-l-5">Offline Sales</span>
                                <div class="float-right">
                                    <b class=" font-size-18 text-dark">7,623 </b>
                                    <span>USD</span>
                                </div>
                                <div class="progress m-t-15">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="m-t-60 m-b-20">
                                <p class="font-size-16">Total Sales</p>
                                <div class="row m-t-20">
                                    <div class="col">
                                        <span class=" font-size-23 text-dark">$23,495 </span>
                                    </div>
                                    <div class="col text-right">
                                        <div id="sparkline-line-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media justify-content-between">
                                <div>
                                    <p class="">Total Revenue</p>
                                    <h2 class="font-size-28 font-weight-light">$23,495</h2>
                                    <span class="text-semibold text-success font-size-15">
                                                    <i class="ti-arrow-up font-size-11"></i>
                                                    <span>12%</span>
                                                </span>
                                </div>
                                <div class="align-self-end">
                                    <i class="ti-credit-card font-size-70 text-success opacity-01"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media justify-content-between">
                                <div>
                                    <p class="">Daily Product</p>
                                    <h2 class="font-size-28 font-weight-light">3,758</h2>
                                    <span class="text-semibold text-danger font-size-15">
                                                    <i class="ti-arrow-down font-size-11"></i>
                                                    <span>7%</span>
                                                </span>
                                </div>
                                <div class="align-self-end">
                                    <i class="ti-pie-chart font-size-70 text-info opacity-01"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media justify-content-between">
                                <div>
                                    <p class="">Growth Rate</p>
                                    <h2 class="font-size-28 font-weight-light">28%</h2>
                                    <span class=" font-size-13 opacity-04">
                                                    from last month
                                                </span>
                                </div>
                                <div class="align-self-end">
                                    <i class="ti-bar-chart font-size-70 text-danger opacity-01"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media justify-content-between">
                                <div>
                                    <p class="">New Customers</p>
                                    <h2 class="font-size-28 font-weight-light">178</h2>
                                    <span class="text-semibold text-success font-size-15">
                                                    <i class="ti-arrow-up font-size-11"></i>
                                                    <span>18%</span>
                                                </span>
                                </div>
                                <div class="align-self-end">
                                    <i class="ti-user font-size-70 text-primary opacity-01"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Order</h4>
                            <div class="card-toolbar">
                                <ul>
                                    <li>
                                        <a class="text-gray" href="javascript:void(0)">
                                            <i class="mdi mdi-dots-vertical font-size-20"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-overflow">
                            <table class="table table-lg">
                                <thead>
                                <tr>
                                    <td class="text-dark text-semibold">Customer</td>
                                    <td class="text-dark text-semibold">Order Date</td>
                                    <td class="text-dark text-semibold">Amount</td>
                                    <td class="text-dark text-semibold">Status</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Marshall Nichols</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>08 May 2018</td>
                                    <td> $168.00</td>
                                    <td>
                                        <span class="status success"></span>
                                        <span class="text-success text-semibold m-l-5">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Susie Willis</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>05 May 2018</td>
                                    <td>$433.00</td>
                                    <td>
                                        <span class="status success"></span>
                                        <span class="text-success text-semibold m-l-5">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Debra Stewart</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>09 May 2018</td>
                                    <td>$2488.00</td>
                                    <td>
                                        <span class="status warning"></span>
                                        <span class="text-warning text-semibold m-l-5">Inactive</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Erin Gonzales</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>16 May 2018</td>
                                    <td>$762.00</td>
                                    <td>
                                        <span class="status danger"></span>
                                        <span class="text-danger text-semibold m-l-5">Disabled</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="list-media">
                                            <div class="list-item">
                                                <div class="media-img">
                                                    <img src="assets/images/avatars/thumb-11.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title p-t-10 text-semibold">Darryl Day</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>16 May 2018</td>
                                    <td>$762.00</td>
                                    <td>
                                        <span class="status success"></span>
                                        <span class="text-success text-semibold m-l-5">Active</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products Statistic</h4>
                            <div class="card-toolbar">
                                <ul>
                                    <li>
                                        <a class="text-gray" href="javascript:void(0)">
                                            <i class="mdi mdi-dots-vertical font-size-20"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center m-t-20">
                                <h2 class="font-weight-light font-size-30 m-b-0">23,178</h2>
                                <p class="opacity-07">Total Products</p>
                            </div>
                            <div class="m-t-60">
                                <canvas class="chart" id="statistic-chart" style="height: 320px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
