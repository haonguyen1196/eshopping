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
    <div class="container" style="height: 494">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="active">Phản hồi đơn hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="register-req">
            <p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi. Chúng tôi sẽ liên hệ với quý khách qua số điện thiện để xác nhận đơn hàng!</p>
        </div><!--/register-req-->
</section> <!--/#cart_items-->
@endsection
