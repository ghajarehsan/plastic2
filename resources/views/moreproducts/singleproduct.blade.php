@extends('layouts.moreproduct.singleproduct')


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
                                <p>                                                                                 <?php //echo $veblog->description?>
                                    dddd
                                </p>


                                <section style="max-height:600px!important;" class="main-slider4">

                                    <div class="owl-carousel owl-theme">

                                        @foreach(explode(',',$product->imageproduct->images) as $key=>$row )

                                            @if($key!=0)

                                                <div class="item">

                                                    <img src="/images/imageproducts/{{$row}}" alt="">

                                                </div>

                                            @endif

                                        @endforeach

                                    </div>

                                </section>


                                <h2 class="mt-3  ">ویژگی ها</h2>

                                <div class="d-flex justify-content-start flex-wrap mt-5">


                                    @foreach($product->params as $key=>$row)

                                        <div class="col-lg-6 mb-4">

                                            <div class="d-flex justify-content-start">

                                                <i class="fa folder">*</i>

                                                <h3 class="mr-1 feature text-info">{{$row->param}} :</h3>

                                                <span class="mr-2">
                                                    {{$row->pivot->value}}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                                <p class="m-4">

                                    <?php echo $product->describtion ?>

                                </p>

                                <h2>

                                    مشخصات فروشنده

                                </h2>


                                <div class="avatar-box" style="min-height: 210px">


                                    <div class="row">
                                        <div class="col-md-12 col-lg-3">
                                            <div class="author-img">
                                                <img src="/images/{{$product->user->avator}}" width="160" height="160">
                                                <p>
                                                    <a href="#">
                                                        {{$product->user->nameofmanager}}

                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-9">
                                            <div class="avatar-des">

                                                <p>

                                                <h4 class="text-info">آدرس فروشنده :</h4>

                                                <p class="p-0 m-0">

                                                    آدرس

                                                </p>

                                                </p>

                                                <p>
                                                <h4 class="text-info">شماره موبایل :</h4>

                                                <p class="p-0 m-0">
                                                    {{$product->user->mobile}}

                                                </p>

                                                </p>


                                            </div>

                                            <a target="_blank" href="/userfactory/detail/{{$product->user->id}}"
                                               class="author-link-post">

                                                مشاهده اطلاعات فروشنده

                                            </a>
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
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <h3>درخواست مشاوره</h3>
                                    <p>برای کسب اطلاعات بیشتر درباره این دوره درخواست مشاوره خود را ارسال کنید و یا با
                                        ما در
                                        تماس باشید.</p>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                       data-bs-whatever="@mdo"> درخواست مشاروه</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="advice-modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 advice-content">
                                                <div class="tel"></div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 advice-form">
                                                <h3>درخواست مشاوره رایگان</h3>
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="recipient-name2" class="col-form-label">نام و نام
                                                            خانوادگی</label>
                                                        <input type="text" class="form-control" id="recipient-name2">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name1" class="col-form-label">پست
                                                            الکترونیکی</label>
                                                        <input type="text" class="form-control" id="recipient-name1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">تلفن
                                                            همراه </label>
                                                        <input type="text" class="form-control" id="recipient-name">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">ارسال فرم</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

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

                    <sendcomment :id="{{$id}}" :auth="{{$auth}}">


                    </sendcomment>

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


