@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Thông tin nhận hàng')

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="active">Thông tin nhận hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="register-req">
            <p>Vui lòng nhập thông tin chính xác để đơn hàng có thể gởi tới bạn nhanh chóng nhất!</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-6">
                    <div class="shopper-info">
                        <p>Thông tin nhận hàng</p>
                        <form action="{{ route('shipping') }}" method="post">
                            @csrf
                            <input class="@error('name') is-invalid @enderror" name="name" type="text" placeholder="Tên người nhận">
                            @error('name')
                                <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="@error('email') is-invalid @enderror" name="email" type="email" placeholder="Email">
                            @error('email')
                                <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="@error('address') is-invalid @enderror" name="address" type="text" placeholder="Địa chỉ">
                            @error('address')
                                <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="@error('phone') is-invalid @enderror" name="phone" type="text" placeholder="Điện thoại">
                            @error('phone')
                                <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="note" type="text" placeholder="Lưu ý" rows="8"></textarea>
                            <button class="btn btn-primary" type="submit">Lưu thông tin</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
</section> <!--/#cart_items-->
@endsection
