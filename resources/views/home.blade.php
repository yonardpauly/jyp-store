@extends('layouts.app')
@section('title', 'User Dashboard')

@section('content')

    <div class="type-wrap text-center display-4">
        <div id="typed-strings">
            <span>Hey <strong>{{ Auth::user()->name }}</strong></span>
            <p>This is your <em><strong>DASHBOARD</strong> page</em></p>
            <p>You can track all your transactions here ..</p>
            <strong>Enjoy!!!</strong>
        </div>
        <span id="typed" style="white-space:pre;"></span>
    </div>

    <hr>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-success text-center" role="alert">
                    <h3 class="alert-heading">YOUR TRANSACTIONS</h3>
                    <hr>
                    <p>
                        You can view all your transactions here.
                    </p>
                </div>

                <section class="cd-timeline js-cd-timeline">
                    <div class="cd-timeline__container">
                        @foreach( $trans as $tran )
                        <div class="cd-timeline__block js-cd-block">
                            <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                <img src="{{ asset('images/cd-icon-picture.svg') }}" alt="Picture">
                            </div>

                            <div class="cd-timeline__content js-cd-content">
                                <h4>Order Code:</h4>
                                {{ $tran->order_code }}
                                <hr>
                                <strong>Total Quantity: </strong><span>{{ $tran->sold_quantity }}</span><br>
                                <strong>Total Amount: </strong><span>{{ '₱'. number_format($tran->total_amount, 2) }}</span>
                                <p>
                                    <a href="#">View Items</a>
                                </p>
                                <span class="cd-timeline__date">{{ \Carbon\Carbon::parse($tran->transaction_date)->diffForHumans() }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-6">

                <div class="alert alert-success text-center" role="alert">
                    <h3 class="alert-heading">YOUR ORDERS</h3>
                    <hr>
                    <p>
                        You can view all your completed orders here whether approved or rejected.
                    </p>
                </div>

                <section class="cd-timeline js-cd-timeline">
                    <div class="cd-timeline__container">
                        @foreach( $orders as $order )
                        <div class="cd-timeline__block js-cd-block">
                            <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                <img src="{{ asset('images/cd-icon-picture.svg') }}" alt="Picture">
                            </div>

                            <div class="cd-timeline__content js-cd-content">
                                <h4>
                                    Dear {{ $order->user->name }},
                                </h4>
                                <p>
                                    {{ $order->message }}
                                </p>
                                <span class="cd-timeline__date">{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
