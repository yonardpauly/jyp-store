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
                                    <td width="15%">₱{{ $item['item'][0]['price'] }}.00</td>
                                    <td>{{ $item['qty'] }}</td>
                                    <td width="25%">{{ $item['price'] }}</td>
                                    <td width="15%">
                                        <button class="item" title="Remove this item">
                                            <i class="zmdi zmdi-delete text-muted"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <strong class="btn btn-primary">{{ $totalQty }}</strong><br>
                                        <strong>Total Quantity</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="btn btn-primary">₱{{ $totalPrice }}</strong><br>
                                        <strong>Total Price</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <a href="{{ route('shop.checkout') }}" class="btn btn-lg btn-primary" type="">Checkout</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection