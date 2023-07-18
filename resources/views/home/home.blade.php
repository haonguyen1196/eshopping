@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Trang chủ')

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
    <script src="{{ asset('cart/cart.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('content')
	<!--slider-->
	@include('home.components.slider')
	<!--/slider-->

	<section>
		<div class="container" style="margin-bottom: 80px">
			<div class="row">

				@include('components.sidebar')

				<div class="col-sm-9 padding-right">
					<!--features_items-->
					@include('home.components.feature_product')
					<!--features_items-->

					<!--category-tab-->
					@include('home.components.category_tab')
					<!--/category-tab-->

					<!--recommended_items-->
					@include('home.components.recommend_product')
					<!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
@endsection
