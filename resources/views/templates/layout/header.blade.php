<?php
    $setting = Cache::get('setting');
    
?>
<header class="vk-header" data-layout="sticky">
    <div class="vk-header__top">
        <div class="container">
            <div class="vk-header__top-content">
                <ul class="vk-list vk-list--inline vk-header__list">
                    <li class="vk-list__item"><a href="{{url('cua-hang')}}">Cửa hàng</a></li>
                    <li class="vk-list__item"><a href="callto:{{$setting->phone}}">Liên hệ: <span class="_hotline">{{$setting->phone}}</span></a></li>
                </ul>
            </div> <!--./content-->
        </div> <!--./container-->

    </div><!--./top-->

    <div class="vk-header__mid">
        <div class="container">
            <div class="vk-header__mid-content">
                <a href="{{url('')}}" class="vk-header__logo">
                    <img src="{{asset('upload/hinhanh/'.$setting->photo)}}" alt="">
                </a> <!--./logo-->
                <div class="vk-header__mid-right">
                </div> <!--./right-->
            </div> <!--./content-->
        </div> <!--./container-->
    </div> <!--./mid-->
    <div class="vk-header__bot">
        <div class="container">
            <div class="vk-header__bot-content">
                <nav class="vk-header__menu">
                    <a href="{{url('')}}" class="vk-header__logo vk-header__logo--bot">
                        <img src="{{asset('upload/hinhanh/'.$setting->photo)}}" alt="">
                    </a> <!--./logo-->
                    <ul class="vk-list vk-list--inline vk-menu vk-menu--main">
                        <li class="vk-list__item"><a href="{{url('')}}">Trang chủ</a></li>
                        <li class="vk-list__item">
                            <a href="shop-list.html">Phòng</a>
                            <ul class="vk-menu vk-menu--child vk-list vk-list--inline">
                                <li class="vk-list__item">
                                    <a href="shop.html">Phòng ngủ</a>
                                    <ul class="vk-menu vk-menu--child vk-list vk-list--inline">
                                        <li class="vk-list__item"><a href="shop.html">Gương</a></li>
                                        <li class="vk-list__item"><a href="shop.html">Kệ sảnh</a></li>
                                        <li class="vk-list__item"><a href="shop.html">Đèn</a></li>
                                        <li class="vk-list__item"><a href="shop.html">Thảm trang trí</a></li>
                                        <li class="vk-list__item"><a href="shop.html">Nội thất sảnh</a></li>

                                    </ul>
                                </li>
                                <li class="vk-list__item"><a href="shop.html">Phòng khách</a></li>
                                <li class="vk-list__item"><a href="shop.html">Phòng ăn</a></li>
                                <li class="vk-list__item"><a href="shop.html">Phòng học & làn việc</a></li>
                                <li class="vk-list__item"><a href="shop.html">Phòng tắm</a></li>
                                <li class="vk-list__item"><a href="shop.html">Nhà Bếp</a></li>
                                <li class="vk-list__item"><a href="shop.html">Sảnh & lối vào</a></li>
                                <li class="vk-list__item"><a href="shop.html">Phòng trẻ em</a></li>
                            </ul>
                        </li>
                        <li class="vk-list__item"><a href="shop.html">Hàng mới về</a></li>
                        <li class="vk-list__item"><a href="{{url('gioi-thieu')}}">Về VIDCOM</a></li>
                        <li class="vk-list__item"><a href="{{url('catalog')}}">CATALOG 2018</a></li>
                        <li class="vk-list__item"><a href="shop.html">Bán chạy nhất</a></li>
                    </ul>
                </nav> <!--./menu-->

                <div class="vk-header__bot-right">
                    <a href="#searchForm" class="vk-btn vk-header__btn-search vk-btn--grey-2" id="btnSearchFornShow"><i class="ti-search"></i></a>
                    <div class="vk-header__search" id="searchForm">
                        <div class="vk-form vk-form--search">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                            <button class="vk-btn vk-btn--grey-2"><i class="ti-search"></i></button>
                        </div>
                    </div> <!--./search-->

                    <div class="vk-header__minicart vk-header__minicart--mid">
                        <a href="{{url('gio-hang')}}" class="vk-btn vk-header__btn-cart vk-btn--grey-2"><img src="{{ asset('public/images/icon-1.png')}}" alt=""></a>
                    </div> <!--./minicart-->
                    <a href="#menu" class="vk-btn vk-header__btn-menu vk-btn--grey-2 d-lg-none"><i class="ti-menu"></i></a>




                </div> <!--./right-->


            </div> <!--./content-->

        </div> <!--./container-->

    </div> <!--./bot-->

</header>