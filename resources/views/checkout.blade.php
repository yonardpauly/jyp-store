@extends('layouts.app')
@section('title', 'Checkout')

@section('content')

    <div class="container">
        @if( session('orderError') )
            <div class="alert alert-danger">
                {{ session('orderError') }}
            </div>
        @endif
        <div class="jumbotron">
            <h1>Checkout Page</h1>
            <hr>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, quam! Odit molestias 
                architecto recusandae doloremque sapiente qui aut molestiae praesentium reprehenderit pariatur? 
                Voluptatem eos harum facilis tenetur laudantium odio voluptate!
            </p>
            <nav>
                <ol class="cd-multi-steps text-bottom count">
                    <li class="visited"><a href="{{ route('shop.index') }}">Home</a></li>
                    <li class="visited" ><a href="{{ route('shop.cart') }}">Cart</a></li>
                    <li class="current">
                        <strong>
                            <em>Checkout</em>
                        </strong>
                    </li>
                </ol>
            </nav>
        </div>

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-earning">
                        <thead class="text-center">
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-right">Subtotal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            @if( count($products) < 1 )
                                <tr>
                                    <td class="text-center" colspan="5">No Cart items found. Go shopping first</td>
                                </tr>
                            @else
                                @foreach( $products as $item )
                                    <tr>
                                        <td width="30%">{{ $item['item'][0]['name'] }}</td>
                                        <td width="15%">{{ '₱'. number_format($item['item'][0]['price'], 2) }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                        <td width="25%">{{ '₱'. number_format($item['price'], 2) }}</td>
                                        <td width="15%">
                                            <button class="item" title="Remove this item">
                                                <i class="zmdi zmdi-delete text-muted"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <table class="table table-borderless table-striped table-earning text-center">
                                <thead>
                                    <tr>
                                        <th>Your Name</th>
                                        <th>Email Address</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach( $customers as $customer )
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-data2 text-center">
                    <thead>
                        <tr>
                            <th>TOTAL QUANTITY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr-shadow">
                            <td>
                                <h2>
                                    <span class="badge badge-info"> {{ $totalQty }}</span>
                                </h2>
                            </td>
                            <td>
                                <h2>
                                    <span class="badge badge-info">₱{{ $totalPrice }}.00</span>
                                </h2>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('shop.storeCheckout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-block btn-primary">Proceed to Buy</button>
                </form>
            </div>
        </div>
    </div>

@endsection