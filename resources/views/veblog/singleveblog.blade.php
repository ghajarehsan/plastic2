@extends('layouts.veblog.singlevebloglayout')


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
                                {{$veblog->title}}
                            </li>
                        </ol>
                    </nav>
                    <!--single breadcrumb end -->
                    <!--single post inner start-->
                    <article class="single-post-inner">
                        <div class="single-post-box">
                            <!--single header-->
                            <header class="single-inner-header">
                                <h1>{{$veblog->title}}</h1>
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
                                                    {{$veblog->user->name}}
                                                </span>
                                            </a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <i class="far fa-eye"></i>
                                            تعداد بازدید :
                                            <span class="text-info">
                                                {{$veblog->viewnumber}}
                                            </span>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <i class="far fa-clock"></i>

                                            تاریخ انتشار :

                                            <span class="text-success">
                                                {{$veblog->date}}
                                            </span>

                                            <span class="text-danger mr-3">
                                                {{$veblog->hour}}
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!--single video-->
                            <div class="video-single">
                                @if($veblog->imageorvideo==2)
                                    <video controls class="video-player-single">
                                        <source src="" type="video/mp4">
                                    </video>
                                @elseif($veblog->imageorvideo==1)
                                    <img src="/images/45.jpg"
                                         alt="">
                                @endif
                            </div>
                            <!--single content-->
                            <div class="single-content">
                                <p>                                                                                 <?php echo $veblog->description?>
                                </p>

                                @foreach($veblog->child as $key=>$row)

                                    @if($row->imageorvideo==2)

                                        <video controls class="video-player-single mt-3">
                                            <source src="" type="video/mp4">
                                        </video>

                                    @elseif($veblog->imageorvideo==1)

                                        <section style="max-height:600px!important;" class="main-slider">

                                            <div class=" owl-carousel owl-theme">

                                                <div class="item"><img src="/images/45.jpg" alt=""></div>

                                                <?php

                                                $images = explode(',', $row->images);

                                                unset($images[0]);


                                                ?>

                                                @foreach($images as $key2=>$row2)

                                                    <div class="item"><img src="/images/imageveblog/<?php echo $row2?>"
                                                                           alt=""></div>

                                                @endforeach


                                            </div>
                                        </section>

                                    @endif

                                    <h2 class="mt-3">{{$row->title}}</h2>

                                    <p><?php
                                        echo $row->description;
                                        ?></p>

                                @endforeach

                                <div class="avatar-box">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3">
                                            <div class="author-img">
                                                <img src="images/avatar-image.jpg" width="160" height="160">
                                                <p>
                                                    <a href="#">زمان الله ابراهیمی</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-9">
                                            <p class="avatar-des">
                                                یک برنامه نویس آزاد که علاقه زیادی به اشتراک گذاری اطلاعات خود با دیگران
                                                داردم. همیشه به وردپرس فکر می کنم و عاشق وردپرس هستم. من یک web
                                                developer
                                                هستم و هدف من آسان کردن ورود سایر دوستان به این شغل جذاب هست. زبان
                                                برنامه
                                                نویسی محبوب من PHP هست.
                                            </p>
                                            <a href="#" class="author-link-post">مشاهده همه مقالات نویسنده</a>
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
                                    <p>برای کسب اطلاعات بیشتر درباره این دوره درخواست مشاوره خود را ارسال کنید و یا با
                                        ما در
                                        تماس باشید.</p>
                                    <a > درخواست مشاروه</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--related post box start-->
                @include('veblog.relatedveblog')
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

                    <sendcommentveblog :id="{{$id}}" :auth="{{$auth}}" >


                    </sendcommentveblog>

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


