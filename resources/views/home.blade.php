@extends('layouts.app')
@section('title', 'User Dashboard')

@section('content')

    <div class="type-wrap text-center display-4">
        <div id="typed-strings">
            <span>Hey <strong>{{ Auth::user()->name }}</strong></span>
            <p>This is your <em><strong>TIMELINE</strong> page</em></p>
            <p>You can track all your transactions here ..</p>
            <strong>Agik putangina nu Ginagawa mu??</strong>
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

                {{-- <div class="cd-timeline__block js-cd-block">
                    <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                        <img src="{{ asset('images/cd-icon-movie.svg') }}" alt="Movie">
                    </div>

                    <div class="cd-timeline__content js-cd-content">
                        <h2>Title of section 2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
                        <span class="cd-timeline__date">Jan 18</span>
                    </div>
                </div>

                <div class="cd-timeline__block js-cd-block">
                    <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                        <img src="{{ asset('images/cd-icon-picture.svg') }}" alt="Picture">
                    </div>

                    <div class="cd-timeline__content js-cd-content">
                        <h2>Title of section 3</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
                        <span class="cd-timeline__date">Jan 24</span>
                    </div>
                </div>

                <div class="cd-timeline__block js-cd-block">
                    <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                        <img src="{{ asset('images/cd-icon-location.svg') }}" alt="Location">
                    </div>

                    <div class="cd-timeline__content js-cd-content">
                        <h2>Title of section 4</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                        <span class="cd-timeline__date">Feb 14</span>
                    </div>
                </div>

                <div class="cd-timeline__block js-cd-block">
                    <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                        <img src="{{ asset('images/cd-icon-location.svg') }}" alt="Location">
                    </div>

                    <div class="cd-timeline__content js-cd-content">
                        <h2>Title of section 5</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                        <span class="cd-timeline__date">Feb 18</span>
                    </div>
                </div>

                <div class="cd-timeline__block js-cd-block">
                    <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                        <img src="{{ asset('images/cd-icon-movie.svg') }}" alt="Movie">
                    </div>

                    <div class="cd-timeline__content js-cd-content">
                        <h2>Final Section</h2>
                        <p>This is the content of the last section</p>
                        <span class="cd-timeline__date">Feb 26</span>
                    </div>
                </div> --}}
                
            </div>
        </section>
    </div>
    
        

@endsection
