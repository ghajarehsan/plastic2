<div class="col-12 col-md-12 col-lg-9">


    <!--content main  box start -->

    <section class="content-main-box  p-4 mb-4">

        <header class="content-main-title">
            <span class="icon-content"><i class="fas fa-bookmark"></i></span>
            <h2 class="d-inline">وبلاگ های سایت</h2>

        </header>
        <!--article post box start -->
        <div class="row">


            <!--article start -->
            <div v-for="allveblog in allveblogs" class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">

                <article class="post-box">
                    <header class="post-header">
                        <figure class="post-image">
                            <img :src="'/images/imageveblog/'+allveblog.images.split(',')[1]"
                                 alt="مطالب اول">
                        </figure>
                    </header>
                    <div class="post-content">
                        <div class="post-entry">
                                        <span class="category">موضوع : <span
                                                    class="namefactory">@{{allveblog.title }}</span></span>

                        </div>
                        <div class="post-excerpt">


                            <div>

                                <p style="overflow: hidden;max-height: 40px">@{{ allveblog.description }}</p>

                            </div>

                            <div class="row mt-2 p-1">

                                <div class="col-12 col-lg-5">


                                    <span>نویسنده :</span>

                                    <span style="font-size: 15px">

                                        @{{ allveblog.user.name }}

                                    </span>


                                </div>

                                <div class="col-12 col-lg-3">

                                    <div class="d-flex flex-row bd-highlight ">


                                        <div class="ml-2 bd-highlight" style="font-size: 19px;">

                                            <i class="fa fa-thumbs-up"></i>

                                        </div>

                                        <div class="bd-highlight">

                                            <span style="font-size: 17px;line-height: 28px;color: #dc3535">@{{ allveblog.likenumber }}</span>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-12 col-lg-4 mt-1">

                                    <span style="font-size: 12px">@{{allveblog.day}}</span>

                                </div>

                            </div>


                        </div>


                        <div class="post-more">
                            <a :href="'/veblog/detail/'+allveblog.id" target="_blank"> اطلاعات بیشتر </a>
                        </div>
                    </div>


                </article>


            </div>
            <!--article end-->

            <div>

                <infinite-loading @infinite="infiniteHandler"></infinite-loading>

            </div>

        </div>
        <!--article post box end -->


    </section>

    <!--content main  box end -->


</div>

