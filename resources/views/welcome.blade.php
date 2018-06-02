@extends('layouts.app')
@section('title', 'PH')

@section('content')
    <div class="container">
            <a href="{{ route('shop.cart') }}">Cart</a>
        
        <div class="row justify-content-center">
            @if( count($products) < 1 )
                <div class="col-md-6 offset-md-3">
                    <h1>No Items found. Please contact system administrator.</h1>
                </div>
            @else
                @foreach( $products as $product )
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/bg-title-01.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mb-3">{{ $product->name }}</h4>
                            <p class="card-text">
                                    {{ $product->description }}
                            </p>
                            <p class="text-info lead">
                                <strong>- ${{ $product->price }}.00</strong>
                            </p>                        
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('shop.guestAdd', $product->slug) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>                            
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 ml-auto">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection