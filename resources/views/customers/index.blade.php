@extends('admin-dashboard.main')
@section('title', 'Customers')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @include('admin-dashboard.stats')
                <div class="row">
                    <div class="col-md-12">

                        @if( session('addSuccess') )
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('addSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif( session('updateSuccess') )
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('updateSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif( session('deleteSuccess') )
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('deleteSuccess') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">All Customers</h3>
                        <hr>
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Reminder</h4>
                            <hr>
                            <p>
                                Admins are not allowed and cannot create customer accounts. Let them register themselves. Thank you.
                            </p>
                        </div>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <a href="#" class="au-btn-filter">
                                        <i class="fa fa-trash"></i>Recycle Bin
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( count($customers) < 1 )
                                        <tr class="tr-shadow">
                                            <td colspan="5" class="text-info text-center">
                                                <h3>No customer(s) found yet.</h3>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach( $customers as $customer )
                                            <tr class="tr-shadow">
                                                <td>
                                                    <span class="status--process">{{ $customer->id }}</span>
                                                </td>
                                                <td class="desc">{{ $customer->name }}</td>
                                                <td class="desc">{{ $customer->email }}</td>
                                                <td>{{ $customer->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                            <div class="container">
                                <div class="row">
                                    <div class="ml-auto">
                                        {{ $customers->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection