@extends('layouts.app')
@section('title', 'PH')

@section('content')

    <div class="container">
        <div class="content">
            <div>
                @component('components.who')
                @endcomponent
            </div>
        </div>
    </div>

@endsection