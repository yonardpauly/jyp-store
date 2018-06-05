@extends('layouts.app')
@section('title', 'User Dashboard')

@section('content')

    <div class="type-wrap text-center display-4">
        <div id="typed-strings">
            <span>Hey <strong>{{ Auth::user()->name }}</strong></span>
            <p>This is your <em><strong>TIMELINE</strong> page</em></p>
            <p>You can track all your transactions here ..</p>
            <strong>Enjoy!!!</strong>
        </div>
        <span id="typed" style="white-space:pre;"></span>
    </div>

    <div class="container">
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

@endsection
