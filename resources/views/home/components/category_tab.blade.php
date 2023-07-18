<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categoryChild as $key => $categoryChildItem)
                <li class="{{ $key == 0 ? 'active' : '' }}">
                    <a href="#category_id{{ $categoryChildItem->id }}" data-toggle="tab">{{ $categoryChildItem->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
            @foreach ($categoryChild as $keyCategoryProduct => $categoryProduct)
                <div class="tab-pane fade {{ $keyCategoryProduct == 0 ? 'active in' : '' }}" id="category_id{{ $categoryProduct->id }}" >
                    @foreach ($categoryProduct->productsCategory as $keyProductItem => $productItem)
                        @if($keyProductItem <= 3)
                            <a href="{{ route('productDetail', ['id' => $productItem->id]) }}">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ config('app.base_url') . $productItem->feature_image_path}}" alt="" />
                                                <h2>{{ number_format($productItem->price) }} VNĐ</h2>
                                                <p>{{ $productItem->name }}</p>
                                                <a
                                                    data-id="{{ $productItem->id }}"
                                                    data-url="{{ route('addToCart') }}"
                                                    href="#"
                                                    class="btn btn-default add-to-cart btn_add_to_cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Thêm vào giỏ hàng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endforeach
    </div>
</div>
