@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Sản phẩm theo danh mục')

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
@endsection

@section('content')

<section>
    <!--slider-->
	@include('home.components.slider')
	<!--/slider-->
    <div class="container" style="margin-bottom: 80px">
        <div class="row">
            @include('components.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{ $categoryName }}</h2>
                    @foreach ($products as $product)
                        <a href="{{ route('productDetail', ['id' => $product->id]) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $baseUrl . $product->feature_image_path }}" alt="" />
                                            <h2>{{ number_format($product->price) }} VNĐ</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    {{ $products->links('pagination::bootstrap-4') }}
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

@endsection
