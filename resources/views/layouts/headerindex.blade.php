<?php

use App\Lib\Helper;

$getsetting = Helper::getsetting();

?>


<header class="header-main">
    <!--notification-bar start -->

    @if(\App\Lib\Helper::$headernotification->status)

        <div class="alert notification-alert alert-dismissible fade show " role="alert">
            <div class="notification-bar">
                <div class="container">
                    <div class="row">
                        <div class="content-notification">
                            <div class="close-notification">
                                <a href="#" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fas fa-window-close"></i>
                                </a>
                                <p>
                                    {{\App\Lib\Helper::$headernotification->value}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endif

<!--notification-bar end -->
    <!--menu top start -->
    <div class="menu-top">
        <div class="container">
            <div class="row">
                <!--top menu content start -->
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="menu-top-content">
                        <ul>
                            <li><a href="/">صفحه اصلی</a></li>

                            <li><a href="/moreproduct" target="_blank">تمام محصولات سایت</a></li>
                            <li><a href="/alluserfactory" target="_blank">شرکت های طرف قرداد با ما</a></li>
                            <li><a href="/alladvert" target="_blank">فروش تجهیزات تولیدی</a></li>
                            <li><a href="/veblog" target="_blank">وبلاگ سایت</a></li>
                        </ul>
                    </div>
                </div>
                <!--top menu content end -->
                <!--top bar link start -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="top-bar-links">
                        <ul>
                            <li><a href="tel:<?php echo Helper::$mobile->value?>">{{\App\Lib\Helper::$mobile->value}} <i
                                            class="fas fa-phone-square-alt"></i></a>
                            </li>
                            <li><a href="mailto:<?php echo Helper::$email->value?>">{{\App\Lib\Helper::$email->value}}
                                    <i
                                            class="fas fa-envelope-open-text"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--top bar link end -->
            </div>
        </div>
    </div>
    <!--menu top end -->
    <!--main menu start -->
    <div class="main-menu-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"
                            aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="navbar-nav me-auto">
                            <li><a href="#">صفحه اصلی</a></li>
                            <li><a href="#">آموزش وردپرس</a></li>
                            <li><a href="#">طراحی قالب </a></li>
                            <li class="menu-item-has-children">
                                <a href="#">آموزش های رایگان</a>
                                <ul>
                                    <li><a href="#">آموزش های طراحی قالب</a></li>
                                    <li><a href="#">آموزش پنل کاربری</a></li>
                                    <li><a href="#">کد های وردپرس</a></li>
                                </ul>
                            </li>
                        </ul>
                        <span class="navbar-brand">
                            <a href="#" class="top-bar-cart">
                                <i class="fas fa-shopping-basket"></i>
                                <span>0</span>
                            </a>

                            @guest

                                <a href="{{route('registerform')}}" class="register-login" target="_blank">
                                <i class="fas fa-user-friends"></i>
                                <span class="first">ورود و ثبت نام</span>
                            </a>

                            @endguest

                            @auth

                                {{\Illuminate\Support\Facades\Auth::user()->name}}

                                <a href="{{route('logout')}}">خروج</a>

                            @endauth


                        </span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--main menu end -->
</header>
