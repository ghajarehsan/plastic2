<?php

use App\Lib\Helper;

$advertslider = Helper::getadvertslider();

?>

<div class="tabs-post-sidebar">


    <nav class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home"
           role="tab" aria-controls="pills-home" aria-selected="true">فروش دستگاه</a>
        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
           role="tab" aria-controls="pills-profile" aria-selected="false">جدید</a>
        <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact"
           role="tab" aria-controls="pills-contact" aria-selected="false">دیدگاه</a>
    </nav>


    <div class="tab-content" id="pills-tabContent">


        <!------------------------box advert start---->

        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
             aria-labelledby="pills-home-tab">

            <ul>

                @foreach($advertslider as $key3=>$row3)

                    <li>

                        <a>

                            <div class="media d-flex flex-column">

                                <div class="d-flex justify-content-start">

                                    <i class="fa fa-bell" style="font-size: 30px;color: #4ba4fe;"></i>

                                    <div class="post-new-title">

                                        فروش :

                                        {{$row3->name}}

                                    </div>


                                </div>

                                <div class="d-flex   justify-content-evenly mt-2">

                                    <i class="fa fa-calendar-check mr-5 ml-2"></i>

                                    <span class="text-danger">
                                        {{$row3->date}}
                                </span>

                                    <i class="fa fa-dollar-sign  ml-1 mr-3"></i>

                                    <span class="ml-1 text-success">                                                          <?= $row3->price ?>
                                    </span>
                                    ریال
                                </div>

                            </div>

                        </a>


                    </li>

                @endforeach

            </ul>
        </div>

        <!------------------------box advert middle---->

        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
             aria-labelledby="pills-profile-tab">
            <div class="sidebar-widget-content">
                <ul>

                    <li>
                        <div class="widget-thumb">
                            <a href="#">
                                <img width="100" height="75" src="">
                            </a>
                        </div>

                        <div class="widget-content-title">
                            <a href="#">
                                آموزش نصب camtasia 2020
                            </a>
                        </div>


                        <div class="widget_excerpt">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از...</p>
                        </div>

                        <div class="widget-meta">
                            <span class="wmt-datetime-meta">1398/08/01</span>

                            <span class="wmt-comment-meta"><a href="#">بدون دیدگاه</a></span>

                            <span class="wmt-author-meta"><a
                                        href="#">زمان الله ابراهیمی</a></span>

                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <!------------------------box advert end---->

        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
             aria-labelledby="pills-contact-tab">
            <div class="aside-comment-content">
                <ul>
                    <li>
                        <div class="aside-comment-avatar">
                            <a href="#">
                                <img src="" alt="">
                            </a>
                        </div>
                        <div class="aside-comment-name">
                            <a href="#">
                                <span class="comment-author">zamanull</span><span
                                        class="comment-in">در</span>
                                تست کامنت
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

