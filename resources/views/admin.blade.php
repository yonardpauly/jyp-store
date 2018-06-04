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
                    <div class="col-md-4">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h3 style="color: #fff">
                                            {{ $totalProds }}
                                        </h3>
                                        <span>Total Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        {{-- <i class="zmdi zmdi-calendar-note"></i> --}}
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                    <div class="text">
                                        <h3 style="color: #fff">
                                            {{ $totalTrans }}
                                        </h3>
                                        <span>Total Transactions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h3 style="color: #fff">
                                            {{ $totalSales }}
                                        </h3>
                                        <span>Total Earnings</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @if( session('acceptOrderSuccess') )
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success!</span>
                            {{ session('acceptOrderSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Sales Transactions</h2>
                        <div class="table-responsive table--no-card m-b-10">
                            <table class="table table-borderless table-striped table-earning text-center">
                                <thead>
                                    <tr>
                                        <th>transaction date</th>
                                        <th>status</th>
                                        <th>order code</th>
                                        <th>customer email</th>
                                        <th>items</th>
                                        <th>total quantity</th>
                                        <th>total price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( count($trans) < 1 )
                                        <tr>
                                            <td colspan="8">No transactions found. Ginagawa mu?</td>
                                        </tr>
                                    @else
                                        @foreach( $trans as $tran )
                                        <tr>
                                            <td>{{ $tran->transaction_date }}</td>
                                            <td>
                                                @if( $tran->order_status_id == 1 )
                                                    <span class="badge badge-danger">Pending</span>
                                                @else
                                                    <span class="badge badge-success">Approved</span>
                                                @endif
                                            </td>
                                            <td>{{ $tran->order_code }}</td>
                                            <td>{{ $tran->customer_email }}</td>
                                            <td>
                                                <!-- Large modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".showItems">Show Items</button>
                                            </td>
                                            <td>{{ $tran->sold_quantity }}</td>
                                            <td>{{ '₱'. number_format($tran->total_amount, 2) }}</td>
                                            <td>
                                                @if( $tran->order_status_id == 1 )
                                                <div class="table-data-feature">
                                                    <a href="{{ route('admin.orderFeedback', $tran->order_code) }}" class="item" title="Approve">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </a>

                                                    <a href="" class="item" title="Reject">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </a>
                                                </div>
                                                @else
                                                <span class="badge badge-success">Completed</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="ml-auto">
                                    {{ $trans->links() }}
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>


            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
