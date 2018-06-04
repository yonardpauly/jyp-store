@extends('layouts.app')
@section('title', 'Cart')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Cart Page</h1>
            <hr>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, quam! Odit molestias architecto recusandae doloremque sapiente qui aut molestiae praesentium reprehenderit pariatur? Voluptatem eos harum facilis tenetur laudantium odio voluptate!
            </p>
        </div>
        <nav>
            <ol class="cd-multi-steps text-bottom count">
                <li class="visited"><a href="{{ route('shop.index') }}">Home</a></li>
                <li class="current">
                    <a href="{{ route('shop.cart') }}"><strong>Cart</strong></a>
                </li>
                <li><em>Checkout</em></li>
            </ol>
        </nav>
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
                                    <td width="15%">{{ money_format('₱%i', $item['item'][0]['price']) }}</td>
                                    <td>{{ $item['qty'] }}</td>
                                    <td width="25%">{{ money_format('₱%i', $item['price']) }}</td>
                                    <td width="15%">
                                        <button class="item" title="Remove this item">
                                            <i class="zmdi zmdi-delete text-muted"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        <a href="{{ route('shop.checkout') }}" class="btn btn-lg btn-block btn-primary">
                                            Checkout
                                        </a>
                                    </td>
                                </tr>

                            @endif

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
                                    <span class="badge badge-info">{{ (!$totalQty) ? 0 : $totalQty }}</span>
                                </h2>
                            </td>
                            <td>
                                <h2>
                                    <span class="badge badge-info">{{ money_format('₱%i', $totalPrice) }}</span>
                                </h2>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection