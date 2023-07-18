@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Thanh toán')

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('cart/cart.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="cart_content">
            @include('payment.components.payment_content')
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection
