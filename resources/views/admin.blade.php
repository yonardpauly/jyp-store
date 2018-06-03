@extends('admin-dashboard.main')
@section('title', 'Admin Dashboard')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="display-4">Welcome to JYP Admin Dashboard!</h2>
                        </div>
                        <p class="lead">
                            This is an overview of JYP shop where you can track all transactions from customers.
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row m-t-25 justify-content-center">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2>388,688</h2>
                                        <span>Products Sold</span>
                                    </div>
                                </div>
                                <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="widgetChart2" height="115" width="129" class="chartjs-render-monitor" style="display: block; width: 129px; height: 115px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>1,086</h2>
                                        <span>this week</span>
                                    </div>
                                </div>
                                <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="widgetChart3" height="115" width="129" class="chartjs-render-monitor" style="display: block; width: 129px; height: 115px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Sales Transactions</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>date</th>
                                        <th>order ID</th>
                                        <th>name</th>
                                        <th class="text-right">price</th>
                                        <th class="text-right">quantity</th>
                                        <th class="text-right">total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2018-09-29 05:57</td>
                                        <td>100398</td>
                                        <td>iPhone X 64Gb Grey</td>
                                        <td class="text-right">$999.00</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">$999.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-28 01:22</td>
                                        <td>100397</td>
                                        <td>Samsung S8 Black</td>
                                        <td class="text-right">$756.00</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">$756.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-27 02:12</td>
                                        <td>100396</td>
                                        <td>Game Console Controller</td>
                                        <td class="text-right">$22.00</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">$44.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-26 23:06</td>
                                        <td>100395</td>
                                        <td>iPhone X 256Gb Black</td>
                                        <td class="text-right">$1199.00</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">$1199.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-25 19:03</td>
                                        <td>100393</td>
                                        <td>USB 3.0 Cable</td>
                                        <td class="text-right">$10.00</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">$30.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-29 05:57</td>
                                        <td>100392</td>
                                        <td>Smartwatch 4.0 LTE Wifi</td>
                                        <td class="text-right">$199.00</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">$1494.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-24 19:10</td>
                                        <td>100391</td>
                                        <td>Camera C430W 4k</td>
                                        <td class="text-right">$699.00</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">$699.00</td>
                                    </tr>
                                    <tr>
                                        <td>2018-09-22 00:43</td>
                                        <td>100393</td>
                                        <td>USB 3.0 Cable</td>
                                        <td class="text-right">$10.00</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">$30.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Logic8 Business Solutions Inc. <a href="https://logic8.io">Logic8</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
