@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Giỏ hàng')

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
    <script src="{{ asset('cart/cart.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
                    <div class="cart_content">
                        @include('cart.components.products_cart')
                    </div>
				</div>
			</div>
		</div>
	</section>
@endsection
