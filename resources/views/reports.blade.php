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

                <div class="row">

                    <div class="col col-md-6 mb-4">
{{--                         <form action="{{ route('admin.searchDate') }}" method="POST">
                            @csrf --}}
                            <div class="input-group">
                                <div class="input-group-btn">
{{--                                     <button class="btn btn-primary" type="submit" name="sortDate">
                                        <i class="fa fa-search"></i> Choose Date
                                    </button> --}}
                                    <a class="btn btn-primary" href="{{ route('admin.searchDate') }}">Sort now</a>
                                </div>
                                <input type="date" name="transac_date" class="form-control">
                            </div>
                        {{-- </form> --}}
                    </div>

                    <div class="col-lg-12">
                        
                        <div class="table-responsive table--no-card m-b-10">
                            <table class="table table-borderless table-striped table-earning text-center">
                                <thead>
                                    <tr>
                                        <th>transaction date</th>
                                        <th>status</th>
                                        <th>order code</th>
                                        <th>customer email</th>
                                        <th>total quantity</th>
                                        <th>price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8">No Reports found</td>
                                    </tr>
                                    @foreach( $sort as $item )
                                    <tr>
                                        <td>{{ $item->transaction_date }}</td>
                                        <td>{{ $item->order_status_id }}</td>
                                        <td>{{ $item->order_code }}</td>
                                        <td>{{ $item->customer_email }}</td>
                                        <td>{{ $item->sold_quantity }}</td>
                                        <td>{{ $item->total_amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="ml-auto">

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
