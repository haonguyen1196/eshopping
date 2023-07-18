@php
	$baseUrl = config('app.base_url');
@endphp
<div class="breadcrumbs">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Trang chủ</a></li>
      <li class="active">Thanh toán</li>
    </ol>
</div><!--/breadcrums-->
<div>
    <?php
        if(session()->get('cart')) {
    ?>
    <div class="review-payment">
        <h2>Xác nhận và tiến hành thanh toán cho đơn hàng!</h2>
    </div>

    <div class="table-responsive cart_info">
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
                            <a data-url="{{ route('updatePayment') }}" data-id="{{ $id }}" class="payment_update btn btn-primary " style="margin-top: 0" href="">Cập nhật</a>
                            <a data-url="{{ route('deletePayment', ['id' => $id ]) }}" class="payment_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                <?php session()->put(['total' => $total]) ?>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Tổng tiền</td>
                                <td><span>{{ number_format($total) }} VNĐ</span></td>
                            </tr>
                            <tr class="shipping-cost">
                                <td>Phí vận chuyển</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Tổng tiền thanh toán</td>
                                <td><span>{{ number_format($total) }} VNĐ</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="payment-options">
        <form action="{{ route('order') }}" method="post">
            @csrf
            <span>
                <label style="margin-bottom: 0"><input name="method" value="1" type="checkbox"> Thanh toán khi nhận hàng</label>
            </span>
            <span style="opacity: 0.5" >
                <label style="pointer-events: none;"><input name="method" value="2" type="checkbox"> Thanh toán qua ví điện tử </label>
            </span>
            <button class="btn btn-primary" style="display: block">Thanh toán</button>
        </form>
    </div>
    <?php
        } else {
    ?>
        <p style="font-size: 20px; font-weight:700; padding-bottom: 344px ">Không có sản phẩm nào cần thanh toán!</p>
    <?php
        }
    ?>

</div>
