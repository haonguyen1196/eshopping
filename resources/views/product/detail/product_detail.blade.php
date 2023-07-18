@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Chi tiết sản phẩm')

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
            @include('components.sidebar')

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img style="object-fit: cover" src="{{ $baseUrl.$productItem->feature_image_path}}" alt="Ảnh sản phẩm" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        @foreach ( $productItem->productImages as $productImageItem)
                                            <a href=""><img  width="26%" src="{{ $baseUrl.$productImageItem->image_path}}" alt="Ảnh sản phấm"></a>
                                        @endforeach
                                    </div>
                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="" class="newarrival" alt="" />
                            <h2>{{ $productItem->name }}</h2>
                            <p>Web ID: {{ $productItem->id }}</p>
                            <span class="product_info_item">
                                <span>{{ number_format($productItem->price) }} VNĐ</span>
                                <label>Số lượng:</label>
                                <input class="quantity" type="number" value="1" min="1"/>
                                <br>
                                <a
                                    data-id="{{ $productItem->id }}"
                                    data-url="{{ route('addToCart') }}"
                                    href=""
                                    style="margin-left: 0"
                                    class="btn btn-fefault cart btn_add_to_cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </a>
                            </span>
                            <p><b>Tình trạng:</b> Còn hàng</p>
                            <p><b>Điều kiện:</b> Mới 100%</p>
                            <p><b>Thương hiệu:</b> {{ $productItem->categories->name}}</p>
                            <a href=""><img src="{{ asset('detail_product/share.png') }}" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
                            <li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                            {!! $productItem->content !!}
                        </div>

                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>

                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Gợi ý sản phẩm</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($productsRecommend as $keyRecommend => $productRecommend)
                                    @if ($keyRecommend % 3 == 0)
								    <div class="item {{ $keyRecommend == 0 ?  'active' : '' }}" >
                                    @endif
    									<a href="{{ route('productDetail', ['id' => $productRecommend->id]) }}">
    									    <div class="col-sm-4">
        										<div class="product-image-wrapper">
        											<div class="single-products">
        												<div class="productinfo text-center">
        													<img src="{{ $baseUrl  .  $productRecommend->feature_image_path }}" alt="" />
        													<h2>{{ number_format($productRecommend->price ) }} VNĐ</h2>
        													<p>{{ $productRecommend->name }}</p>
        													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
        												</div>

        											</div>
        										</div>
                                            </div>
    									</a>
    								@if($keyRecommend % 3 == 2)
                                    </div>
                                    @endif
								@endforeach
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>
                </div><!--/recommended_items-->
            </div>
        </div>
    </div>
</section>

@endsection
