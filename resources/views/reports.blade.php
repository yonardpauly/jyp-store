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
                            <h2 class="display-4">Sales Report</h2>
                        </div>

                        <p class="lead">
                            This is an overview of JYP shop where you can track all transactions from customers.
                        </p>
                        
                        <hr>
                    </div>
                </div>
                @include('admin-dashboard.stats')

{{--                 <form action="{{ route('admin.searchDate') }}" method="POST">
                    <input type="text" name="date" class="form-control">
                    <button class="btn btn-primary" type="submit">Search</button>   
                </form> --}}

                <div class="row">

                    <div class="col-lg-12">
                        
                        <div class="table-responsive table--no-card m-b-10">
                            <table id="#reports-table" class="table table-borderless table-striped table-earning text-center">
                                <thead>
                                    <tr>
                                        <th>transaction date</th>
                                        <th>status</th>
                                        <th>order code</th>
                                        <th>total quantity</th>
                                        <th>price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( count($reports) < 1 )
                                        <tr>
                                            <td colspan="8">No Reports found</td>
                                        </tr>
                                    @else
                                    @foreach( $reports as $report )
                                    <tr>
                                        <td>{{ $report->transaction_date }}</td>
                                        <td>
                                            @if( $report->order_status_id == 1 )
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif( $report->order_status_id == 3 )
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>{{ $report->order_code }}</td>
                                        <td>{{ $report->sold_quantity }}</td>
                                        <td>{{ '₱'. number_format($report->total_amount, 2) }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="ml-auto">
                                    <div class="row">
                                        <div class="ml-auto">
                                            {{ $reports->links() }}
                                        </div>
                                    </div>
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