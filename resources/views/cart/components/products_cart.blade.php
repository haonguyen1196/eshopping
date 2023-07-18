@php
	$baseUrl = config('app.base_url');
@endphp

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
            {!! $carts ? '' : '<p style="font-size: 20px; font-weight:700; height: 374px"> Không có sản phẩm nào trong giỏ hàng! </p>' !!}
        </div>
        <div class="table-responsive cart_info" {{ $carts ? '' : 'hidden'}}>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style=" padding-right: 30">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($carts as $id => $cart)
                        @php
                            $total += $cart['price'] * $cart['quantity']
                        @endphp
                        <tr class="wrap_cart_product">
                            <td class="cart_product" style="margin-left: 10;">
                                <a href=""><img width="110" height="110" src="{{ $baseUrl . $cart['image']}}" alt="Ảnh sản phẩm"/></a>
                            </td>
                            <td class="cart_description">
                                <h4 style="margin-top: 0">
                                    <a href="">
                                        {{
                                            Str::length($cart['name']) > 30 ? Str::substr($cart['name'], 0, 20) . '...' : $cart['name']
                                        }}
                                    </a>
                                </h4>
                            </td>
                            <td class="cart_price">
                                <p style="margin-bottom: 0">{{ number_format($cart['price']) }} VNĐ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up btn_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input input_quantity" type="text" name="quantity" value="{{ $cart['quantity'] }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down btn_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" style="margin-bottom: 0">{{ number_format($cart['price']*$cart['quantity']) }} VNĐ</p>
                            </td>
                            <td class="cart_delete" style="margin-right: 2;">
                                <a data-url="{{ route('updateCart') }}" data-id="{{ $id }}" class="cart_quantity_update btn btn-primary" style="margin-top: 0" href="">Cập nhật</a>
                                <a data-url="{{ route('deleteCart', ['id' => $id ]) }}" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action" {{ $carts ? '' : 'hidden'}}>
    <div class="container">
        <div class="heading">
            <h3>Thanh toán đơn hàng</h3>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền <span>{{ number_format($total) }} VNĐ</span></li>
                        <li>Phí giao hàng <span>Miễn phí</span></li>
                        <li>Tổng tiền thanh toán <span>{{ number_format($total) }} VNĐ</span></li>
                    </ul>
                        <?php
                            if(session()->get('customer_id') != NULL) {
                        ?>
                            <a class="btn btn-default check_out" href="{{ route('checkout') }}">Thanh toán</a>
                        <?php
                            } else {
                        ?>
                            <a class="btn btn-default check_out" href="{{ route('loginPage') }}">Thanh toán</a>
                        <?php
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
