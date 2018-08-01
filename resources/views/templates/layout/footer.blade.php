<?php
    $setting = Cache::get('setting');
?>
<footer class="vk-footer">
    <div class="container">
        <div class="vk-footer__top">
            <div class="row">
                <div class="col-lg-5">
                    <div class="vk-footer__item">

                        <a href="{{url('')}}" class="vk-footer__logo">
                            <img src="{{asset('upload/hinhanh/'.$setting->photo)}}" alt="">
                        </a>

                        <ul class="vk-footer__list-icon vk-list">
                            <li class="vk-list__item"> <i class="_icon fa fa-home"></i> Địa chỉ:  {{$setting->address}}</li>
                            <li class="vk-list__item"> <i class="_icon fa fa-envelope"></i> Email: <a href="{{$setting->email}}">{{$setting->email}}</a> 
                                <!-- <a href="mailto:contact@gco.vn">contact@gco.vn</a></li> -->
                            <li class="vk-list__item"> <i class="_icon fa fa-phone"></i>  Hotline: <a href="callto:{{$setting->phone}}">{{$setting->phone}}</a></li>
                        </ul>

                    </div>
                </div><!--./col-->

                <div class="col-lg-2">
                    <div class="vk-footer__item">
                        <h2 class="vk-footer__title">Về chúng tôi</h2>
                        <ul class="vk-footer__list vk-list">
                            <li class="vk-list__item"><a href="#">Tin tức Vidcom</a></li>
                            <li class="vk-list__item"><a href="{{url('gioi-thieu')}}">Về Vidcom</a></li>
                            <li class="vk-list__item"><a href="{{url('catalog')}}">Catalog 2018</a></li>
                            <li class="vk-list__item"><a href="{{url('cua-hang')}}">Hệ thống cửa hàng</a></li>
                        </ul>
                    </div>
                </div><!--./col-->

                <div class="col-lg-3">
                    <div class="vk-footer__item">
                        <h2 class="vk-footer__title">Thiết kế nội thất</h2>
                        <ul class="vk-footer__list vk-list">
                            <li class="vk-list__item"><a href="#">Phòng ngủ</a></li>
                            <li class="vk-list__item"><a href="#">Phòng khách</a></li>
                            <li class="vk-list__item"><a href="#">Phòng ăn</a></li>
                            <li class="vk-list__item"><a href="#">Phòng học & làn việc</a></li>
                            <li class="vk-list__item"><a href="#">Phòng tắm</a></li>

                        </ul>

                    </div>
                </div><!--./col-->

                <div class="col-lg-2">
                    <div class="vk-footer__item">
                        <h2 class="vk-footer__title">Liên hệ với Vidcom</h2>
                        <ul class="vk-list vk-list--inline vk-footer__social mb-4">
                            <li class="vk-list__item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="vk-list__item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="vk-list__item"><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li class="vk-list__item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>

                        <a href="#" class="vk-footer__bct">
                            <img src="images/bct.png" alt="" class="mw-100">
                        </a>
                    </div>
                </div><!--./col-->
            </div> <!--./ROW-->
        </div> <!--./top-->

        <div class="vk-footer__bot">
            Copyright © 2018 by Vidcom - All rights reserved.
        </div> <!--./vk-footer__bot-->
    </div> <!--./container-->
</footer><!--./vk-footer-->

<nav class="" id="menu">

    <ul class="">
        <li class=""><a href="index.html">Trang chủ</a></li>
        <li class="">
            <a href="shop-list.html">Phòng</a>
            <ul class="">
                <li class="">
                    <a href="shop.html">Phòng ngủ</a>
                    <ul class="">
                        <li class=""><a href="shop.html">Gương</a></li>
                        <li class=""><a href="shop.html">Kệ sảnh</a></li>
                        <li class=""><a href="shop.html">Đèn</a></li>
                        <li class=""><a href="shop.html">Thảm trang trí</a></li>
                        <li class=""><a href="shop.html">Nội thất sảnh</a></li>

                    </ul>
                </li>
                <li class=""><a href="shop.html">Phòng khách</a></li>
                <li class=""><a href="shop.html">Phòng ăn</a></li>
                <li class=""><a href="shop.html">Phòng học & làn việc</a></li>
                <li class=""><a href="shop.html">Phòng tắm</a></li>
                <li class=""><a href="shop.html">Nhà Bếp</a></li>
                <li class=""><a href="shop.html">Sảnh & lối vào</a></li>
                <li class=""><a href="shop.html">Phòng trẻ em</a></li>
            </ul>
        </li>
        <li class=""><a href="shop.html">Hàng mới về</a></li>
        <li class=""><a href="about.html">Về VIDCOM</a></li>
        <li class=""><a href="catalog.html">CATALOG 2018</a></li>
        <li class=""><a href="shop.html">Bán chạy nhất</a></li>
    </ul>
</nav>
