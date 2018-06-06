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
                            <h2 class="display-4">JYP Admin Dashboard</h2>
                        </div>
                        <p class="lead">
                            This is an overview of JYP shop where you can track all transactions from customers.
                        </p>
                        <hr>
                    </div>
                </div>
                @include('admin-dashboard.stats')
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
                                        <th>order code</th>
                                        <th>customer email</th>
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
                                            <td>{{ $tran->order_code }}</td>
                                            <td>{{ $tran->customer_email }}</td>
                                            <td>{{ $tran->sold_quantity }}</td>
                                            <td>{{ '₱'. number_format($tran->total_amount, 2) }}</td>
                                            <td>
                                                @if( $tran->order_status_id == 1 )
                                                <div class="table-data-feature">
                                                    <a href="{{ route('admin.orderFeedback', $tran->order_code) }}" class="item" title="Approve">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </a>

                                                    <a href="{{ route('admin.rejectedFeedback', $tran->order_code) }}" class="item" title="Reject">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </a>
                                                </div>
                                                @elseif($tran->order_status_id == 3)
                                                    <span class="badge badge-danger">Rejected</span>
                                                @else
                                                    <span class="badge badge-success">Approved</span>
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
