<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValueSettingTable('phone_contact') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigValueSettingTable('email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ getConfigValueSettingTable('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ getConfigValueSettingTable('twitter_link') }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getConfigValueSettingTable('linkedin_link') }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ getConfigValueSettingTable('dribbble_link') }}"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="{{ getConfigValueSettingTable('google_link') }}"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ route('home') }}"><img src="{{ asset('home/images/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-star"></i> Danh sách yêu thích</a></li>
                            <?php
                            if(session()->get('customer_id') != NULL) {
                            ?>
                                <li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                                } else {
                            ?>
                                <li><a href="{{ route('loginPage') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                                }
                            ?>
                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                                $customer_id = session()->get('customer_id');
                                if($customer_id != NULL) {
                            ?>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                            <?php
                                } else {
                            ?>
                                <li><a href="{{ route('loginPage') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    @include('components.main_menu')
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="search_box pull-right">
                            <input name="search" type="text" placeholder="Tìm kiếm"/>
                            <button type="submit" style="margin: 0; height: 34px;" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
