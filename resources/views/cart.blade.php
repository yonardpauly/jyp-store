@extends('layouts.app')
@section('title', 'Cart')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( session('guestCart') )
                                @foreach( session('guestCart') as $data )
                                <tr>
                                    <td>{{ $data->item }}ss</td>
                                    <td>100398</td>
                                    <td>iPhone X 64Gb Grey</td>
                                    <td class="text-right">$999.00</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection