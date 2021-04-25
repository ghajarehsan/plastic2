<!--main comment slider start -->
<section class="main-comment">
    <div class="container">
        <header class="slicer-box-item-title text-center mb-4">
            <h2 class="d-inline"> تولیدی های طرف قرارداد با ما </h2>
            <div class="border-des">
                <span><i class="fas fa-microphone"></i> </span>
            </div>
        </header>
        <div class="owl-carousel owl-theme main-slider-comment">
            <div class="item">
                <div class="comment-slider-box">
                    <div class="comment-slider-content">
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                            گرافیک
                            است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطر آنچنان که لازم است.لورم ایپسوم
                            متن
                            ساختگی با تولید سادگی نامفهوم از صنعت چاپ.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    <div class="comment-slider-avatar">
                                        <img src="images/user-profile-1.png" alt="نام مشتری">
                                    </div>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <div class="comment-slider-author">
                                        <h5>نام مشتری</h5>
                                        <span>عنوان مشتری</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="click-author-video">
                                <a href="#">
                                    <i class="far fa-play-circle"></i>
                                    <p>مشاهده ویدیو</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--main comment slider end -->

<!--banner row image start-->
<section class="ads-banner-box">

    <div class="container">

        <div class="owl-carousel owl-theme">

            @foreach($userfactory as $userfactorykey=>$userfactoryrow)

                <?php

                $imageuser = explode(',', $userfactoryrow->detailfactory->images);

                ?>

                <div class="item ">
                    <div class="ads-banner-box-hover">
                        <a href="/userfactory/detail/{{$userfactoryrow->id}}" target="_blank" class="cat-item"
                           style="background-image: url('/images/imagefactory/{{$imageuser[1]}}')">
                            <div class="inner-des">

                                <div>

                                    <p class="cat-name">{{$userfactoryrow->detailfactory->namefactory}}</p>

                                </div>

                                <p class="cat-des">

                                        <span class="row ">

                                            <span class="col-6 mt-3">

                                                <span>

                                                    <span>نام مدیر :</span>

                                                    <span style="color:green ;font-size: 18px">
                                                        {{$userfactoryrow->detailfactory->nameofmanager}}
                                                    </span>

                                                </span>

                                            </span>

                                            <span class="col-6 mt-3">

                                                <span>

                                                    <span>تخصص :</span>

                                                    <span style="color:green ;font-size: 18px">
                                                        {{$userfactoryrow->detailfactory->perfession}}
                                                    </span>

                                                </span>

                                            </span>

                                            <span class="col-6 mt-3">

                                                <span>

                                                    <span>تعداد دستگاه ها :</span>

                                                    <span style="color:green ;font-size: 18px">
                                                        {{$userfactoryrow->detailfactory->numberofequepment}}
                                                    </span>

                                                </span>

                                            </span>

                                            <span class="col-6 mt-3">

                                                <span>

                                                    <span>تعداد پرسنل :</span>

                                                    <span style="color:green ;font-size: 18px">
                                                        {{$userfactoryrow->detailfactory->numberofworker}}
                                                    </span>

                                                </span>

                                            </span>

                                            <span class="col-12 mt-3">

                                                <span>

                                                    <span>   محدوده تولیدی :</span>

                                                    <span style="color:green ;font-size: 18px">
                                                        {{$userfactoryrow->detailfactory->city}}
                                                    </span>

                                                </span>

                                            </span>

                                        </span>


                                </p>

                            </div>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>

    </div>
</section>
<!--banner row image end-->