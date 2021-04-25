@extends('layouts.advert.singleadvert')


@section('content')

    <!--main content start -->
    <main class="main-single mt-4">

        <div class="container">
            <div class="row">
                <!--content start -->
                <div class="col-12 col-md-12 col-lg-9">
                    <!--single breadcrumb start-->
                    <nav aria-label="breadcrumb" class="single-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" target="_blank">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="#"> </a></li>
                            <li class="breadcrumb-item"><a href="/veblog" target="_blank"> وبلاگ ها </a></li>
                            <li class="breadcrumb-item active" aria-current="page">

                            </li>
                        </ol>
                    </nav>
                    <!--single breadcrumb end -->
                    <!--single post inner start-->
                    <article class="single-post-inner">
                        <div class="single-post-box">
                            <!--single header-->
                            <header class="single-inner-header">
                                <h1></h1>
                                <div class="single-post-meat">
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <i class="far fa-folder"></i>
                                            <a href="#" class="category-tag">وبلاگ</a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <i class="far fa-user"></i>
                                            <a href="#">
                                                نویسنده :
                                                <span class="text-danger">

                                                </span>
                                            </a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <i class="far fa-eye"></i>
                                            تعداد بازدید :
                                            <span class="text-info">

                                            </span>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <i class="far fa-clock"></i>

                                            تاریخ انتشار :

                                            <span class="text-success">

                                            </span>

                                            <span class="text-danger mr-3">

                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!--single video-->
                            <!--single content-->
                            <div class="single-content">
                                <p>

                                <div class="col-lg-6 mb-4">

                                    <div class="d-flex justify-content-start">

                                        <i class="fa folder">*</i>

                                        <h3 class="mr-1 feature text-info">
                                            نام محصول :
                                        </h3>

                                        <span class="mr-2">
                                                    {{$advert->name}}
                                                </span>

                                    </div>

                                </div>

                                </p>


                                <section style="max-height:600px!important;" class="main-slider4">

                                    <div class="owl-carousel owl-theme">

                                        @foreach(explode(',',$advert->images) as $key1=>$row1)

                                            @if($key1!=0)

                                                <div class="item">

                                                    <img src="/images/imagefactory/{{$row1}}" alt="">

                                                </div>

                                            @endif

                                        @endforeach

                                    </div>

                                </section>


                                <h2 class="mt-3  ">ویژگی ها</h2>


                                <div class="d-flex justify-content-start flex-wrap mt-5">

                                    @foreach($advert->param as $key2=>$row2)

                                        <div class="col-lg-6 mb-4">

                                            <div class="d-flex justify-content-start">

                                                <i class="fa folder">*</i>

                                                <h3 class="mr-1 feature text-info">
                                                    {{$row2->param}}
                                                </h3>

                                                <span class="mr-2">
                                                 {{$row2->pivot->value}}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                    <div class="col-lg-6 mb-4">

                                        <div class="d-flex justify-content-start">

                                            <i class="fa folder">*</i>

                                            <h3 class="mr-1 feature text-info">
                                                قیمت :
                                            </h3>

                                            <span class="mr-2">
                                                    {{$advert->price}}
                                                </span>

                                        </div>

                                    </div>

                                    <div class="col-lg-6 mb-4">

                                        <div class="d-flex justify-content-start">

                                            <i class="fa folder">*</i>

                                            <h3 class="mr-1 feature text-info">
                                                نام فروشنده :
                                            </h3>

                                            <span class="mr-2">
                                                    {{$advert->user->name}}
                                                </span>

                                        </div>

                                    </div>

                                    <div class="col-lg-6 mb-4">

                                        <div class="d-flex justify-content-start">

                                            <i class="fa folder">*</i>

                                            <h3 class="mr-1 feature text-info">
                                                موبایل فروشنده :
                                            </h3>

                                            <span class="mr-2">
                                                    {{$advert->user->mobile}}
                                                </span>

                                        </div>

                                    </div>

                                    <div class="col-lg-12 mb-4">

                                        <div class="d-flex justify-content-start">

                                            <i class="fa folder">*</i>

                                            <h3 class="mr-1 feature text-info">
                                                توضیحات :
                                            </h3>

                                            <span class="mr-2">
                                                    {{$advert->describtion}}
                                                </span>

                                        </div>

                                    </div>


                                </div>


                                <div class="single-share">
                                    اشتراک گذاری:
                                    <a href="#"><i class="far fa-paper-plane"></i> </a>
                                    <a href="#"><i class="fab fa-twitter"></i> </a>
                                    <a href="#"><i class="fab fa-facebook-f"></i> </a>
                                </div>
                            </div>

                        </div>
                    </article>
                    <!--single post inner end-->


                    <!--single social-->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="#" class="single-box-so single-instagram">
                                <div class="single-so-icon">
                                    <img src="images/instagram-logo.svg" alt="">
                                </div>
                                <div class="single-so-text">
                                    در <b>اینستاگرام</b><br>
                                    ما را دنبال کنید!
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="#" class="single-box-so single-telegram">
                                <div class="single-so-icon">
                                    <img src="images/telegram-logo-svgrepo-com.svg" alt="">
                                </div>
                                <div class="single-so-text">
                                    در <b>تلگرام</b><br>
                                    کانال ما را دنبال کنید!
                                </div>
                            </a>
                        </div>
                    </div>


                    <!--advice box-->
                    <div class="advice-box">
                        <div class="advice-inner">
                            <div class="row">
                                <div class="col-md-6">

                                    <img src="/images/advice.png">

                                </div>
                                <div class="col-md-6">
                                    <h3>درخواست مشاوره</h3>
                                    <p>

                                        به راحتی میتوانید با پشتیبان های به صورت آنلاین مشاوره بگیری ن در ص ورت پاسخگو
                                        نبودن سیستم چت آنلاین لطفا با شماره درج شده در هدر سایت تماس حاصل کنید.

                                    </p>
                                    <a>
                                        درخواست مشاوره
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--related post box start-->

                    <!--related post box end-->


                    <!--single comment form start-->

                    <?php

                    $check = \Illuminate\Support\Facades\Auth::check();

                    if ($check) {

                        $auth = \Illuminate\Support\Facades\Auth::user();

                    } else {

                        $auth = '0';

                    }


                    ?>

                    <sendcommentadvert :id="{{$id}}" :auth="{{$auth}}">


                    </sendcommentadvert>

                    <!--single comment form end-->


                </div>
                <!--content end -->

                <!--sidebar start -->
                <div class="col-12 col-md-12 col-lg-3">

                    <aside class="sidebar-home" id="sidebar1">


                        <!--sidebar ads start-->

                    @include('layouts.slider.advertimage')

                    <!--sidebar ads end-->


                        <!--tabs post start -->

                    @include('layouts.slider.slidertabs')

                    <!--tabs post end -->


                        <!--- fiter start --->


                        <!--- fiter end --->


                        <!--post blog start-->

                    @include('layouts.slider.lastcomment')

                    <!--post blog end-->

                    </aside>

                </div>
                <!--sidebar end -->

            </div>
        </div>
    </main>
    <!--main content end-->


@endsection


