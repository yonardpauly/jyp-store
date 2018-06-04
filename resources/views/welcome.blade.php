@extends('layouts.app')
@section('title', 'PH')

@section('content')

    <div class="container">
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
                @endif
            </div>

        </div>
    </div>
    
    <div class="container">
        @if( session('orderSuccess') )
            <div class="alert alert-success">
                {{ session('orderSuccess') }}
            </div>
        @endif
        <div class="jumbotron">
            <h1>Home Page</h1>
            <hr>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, quam! 
                Odit molestias architecto recusandae doloremque sapiente qui aut molestiae 
                praesentium reprehenderit pariatur? Voluptatem eos harum facilis tenetur laudantium 
                odio voluptate!
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @if( count($products) < 1 )
                <div class="col-md-6">
                    <h1>No Items found. Please contact system administrator.</h1>
                </div>
            @else
                @foreach( $products as $product )
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/bg-title-01.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">
                                    <a href="#0" class="js-cd-panel-trigger" data-panel="main">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                <p class="card-text">
                                    {{ $product->description }}
                                </p>
                                <p class="text-info lead">
                                    <strong>- {{ '₱'. number_format($product->price, 2) }}</strong>
                                </p>
                                <p class="text-info lead">
                                    @if( $product->quantity < 1 )
                                        <span class="badge badge-warning">Out of Stock</span>
                                    @else
                                        <span class="badge badge-info">In Stock</span>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('shop.guestAdd', $product->slug) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" {{ ($product->quantity) < 1 ? 'disabled' : '' }}>Add to Cart</button>                            
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 ml-auto">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection