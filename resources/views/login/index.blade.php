@php
	$baseUrl = config('app.base_url');
@endphp
@extends('layouts.master')

@section('title', 'Đăng nhập')

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    @if(session()->has('createCustomer'))
        <script type="text/javascript">
            $(function () {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tạo tài khoản thành công!',
                    showConfirmButton: false,
                    timer: 2000
                })
            })
        </script>
    @endif
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập vào tài khoản của bạn</h2>
                    <p style="color: red">{{ session()->get('messageLogin') }}</p>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <input class=" @error('email_login') is-invalid @enderror" name="email_login" type="email" placeholder="Nhập email" />
                         @error('email_login')
                            <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input class=" @error('password_login') is-invalid @enderror" name="password_login" type="password" placeholder="Nhập mật khẩu" />
                         @error('password_login')
                            <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <span>
                            <input type="checkbox" class="checkbox">
                            Ghi nhớ
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Tạo tài khoản mới</h2>
                    <form action="{{ route('signup') }}" method="post">
                        @csrf
                        <input name="name" type="text" class=" @error('name') is-invalid @enderror"  placeholder="Tên tài khoản"/>
                        @error('name')
                            <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input  name="email" type="email" class="@error('email') is-invalid @enderror" placeholder="Địa chỉ email"/>
                        @error('email')
                            <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input  name="password" type="password" class="@error('password') is-invalid @enderror" placeholder="Password"/>
                        @error('password')
                            <div style="padding: 6" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-default btn_sign_up">Đăng kí</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
