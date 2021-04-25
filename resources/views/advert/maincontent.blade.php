<div class="col-12 col-md-12 col-lg-9">


    <!--content main  box start -->

    <section class="content-main-box  p-4 mb-4">

        <header class="content-main-title">
            <span class="icon-content"><i class="fas fa-bookmark"></i></span>
            <h2 class="d-inline">فروش تجهیزات جانبی</h2>

        </header>
        <!--article post box start -->
        <div class="row">


            <!--article start -->
            <div v-for="(alladvert ,$index) in alladverts" class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                <article class="post-box">
                    <header class="post-header">
                        <figure class="post-image">
                            <img :src="'/images/imageadvert/'+alladvert.images.split(',')[1]"
                                 alt="مطالب اول">
                        </figure>
                    </header>
                    <div class="post-content">
                        <div class="post-entry">
                                        <span class="category">نام تولیدی : <span
                                                    class="namefactory">صص</span></span>

                        </div>
                        <div class="post-excerpt">

                            <div class="row mb-3">

                                <div class="col-6">

                                    <span>نام مدیر :</span>

                                    <span style="color: #1d68a7;font-size: 14px;">قق</span>

                                </div>

                                <div class="col-6">

                                    <span>تعداد کارمندان :</span>

                                    <span style="color: #1d68a7;font-size: 14px;">اا</span>


                                </div>

                            </div>

                            <div class="row mb-3">

                                <div class="col-6">

                                    <span>تخصص :</span>

                                    <span style="color: #1d68a7;font-size: 14px;">لل </span>

                                </div>

                                <div class="col-6">

                                    <span>تعداد تجهیزات :</span>

                                    <span style="color: #1d68a7;font-size: 14px;">یی</span>


                                </div>

                            </div>

                            <div class="row mb-3">

                                <div class="col-12">


                                    <span>تاریخ تبلیغ :</span>

                                    <span style="color: #dc3535;font-size: 15px">

                                        @{{ alladvert.date }}

                                    </span>

                                    <span style="color: green;font-size: 15px" class="mr-2">

                                        @{{ alladvert.time }}

                                    </span>


                                </div>

                            </div>


                        </div>


                        <div class="post-more">
                            <a target="_blank" :href="'/advert/detail/'+alladvert.id"> اطلاعات بیشتر تولیدی </a>
                        </div>
                    </div>


                </article>


            </div>
            <!--article end-->

            <div>

                <infinite-loading :identifier="identifier" @infinite="infiniteHandler"></infinite-loading>

            </div>

        </div>
        <!--article post box end -->


    </section>

    <!--content main  box end -->


</div>

