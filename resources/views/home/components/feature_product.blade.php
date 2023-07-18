<div class="features_items">
    <h2 class="title text-center">Sản phẩm mới</h2>
    @foreach($products as $product)
        <a href="{{ route('productDetail', ['id' => $product->id]) }}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ $baseUrl . $product->feature_image_path }}" alt="" />
                                <h2>{{ number_format($product->price) }} VNĐ</h2>
                                <p>{{ $product->name }}</p>
                                <a
                                    data-id="{{ $product->id }}"
                                    data-url="{{ route('addToCart') }}"
                                    href="#"
                                    class="btn btn-default add-to-cart btn_add_to_cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </a>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
