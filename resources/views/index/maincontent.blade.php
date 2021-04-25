<div class="container">

    <div class="row">
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

            @include('layouts.slider.filter')

            <!--- fiter end --->


                <!--post blog start-->

            @include('layouts.slider.lastcomment')

            <!--post blog end-->

            </aside>

        </div>

        <!---slider end -->

        <!--content start -->
        <div class="col-12 col-md-12 col-lg-9">
            <!--search box start -->
            <div class="main-search-box">
                <div class="input-group mb-3 input-group-lg ">
                    <input type="text" class="form-control" placeholder="دنبال چی میگردی ..."
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"> جستجو</button>
                </div>
            </div>
            <!--search box end -->


            <!--component of main gallery index start -->


            <maingalleryindex>


            </maingalleryindex>

            <!--component of main gallery index end-->


            <!--content main  box start -->

            <section class="content-main-box mt-4 p-4 mb-4">
                <header class="content-main-title">
                    <span class="icon-content"><i class="fas fa-bookmark"></i></span>
                    <h2 class="d-inline"> تمام محصولات شرکت های عضو سایت پلاستیک </h2>
                    <p class="float-end d-inline"><a href="/moreproduct" target="_blank"><i class="fas fa-plus"></i>
                            مشاهده همه </a></p>
                </header>
                <!--article post box start -->
                <div class="row">


                    <!--article start -->
                    <div v-for="allproductt in allproducts" class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                        <article class="post-box">
                            <header class="post-header">
                                <figure class="post-image">
                                    <img :src="'/images/imageproducts/'+allproductt.imageproduct.images.split(',')[1]"
                                         alt="مطالب اول">
                                </figure>
                            </header>
                            <div class="post-content">
                                <div class="post-entry">
                                    <span class="category">شرکت تولید کننده : <span class="namefactory">@{{ allproductt.user.namefactory }}</span></span>
                                    <h2 class="entry-title">
                                        @{{allproductt.name}}
                                    </h2>
                                </div>
                                <div class="post-excerpt">

                                    @{{allproductt.describtion}}

                                </div>

                                <div class="price">

                                    <h3>قیمت :</h3>

                                    <span>@{{allproductt.price}} تومان</span>

                                </div>

                                <div class="post-more">
                                    <a :href="'/product/detail/'+allproductt.id" target="_blank"> اطلاعات بیشتر محصول </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--article end-->


                </div>
                <!--article post box end -->

                <div class="box-pagination col-lg-12">

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item" v-if="links.current_page >1"
                                v-on:click="opratefilter(links.prev_page_url)">
                                <a class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>


                            <li v-on:click="opratefilter(url+numberpage)" v-for="numberpage  in links.last_page"
                                class="page-item" v-bind:class="{active:links.current_page==numberpage}"><a
                                        class="page-link">
                                    @{{ numberpage }}
                                </a></li>


                            <li class="page-item" v-on:click="opratefilter(links.next_page_url)"
                                v-if="links.last_page > links.current_page">
                                <a class="page-link" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>

            </section>

            <!--content main  box end -->


            <!--content main box slider start -->
            <section class="slider-box-item mb-4 mt-4">
                <header class="slicer-box-item-title text-center mb-4">
                    <h2 class="d-inline">ارزان ترین محصولات</h2>
                    <div class="border-des">
                        <span> ارزان ترین محصولات تولید شده در ماه اخیر توسط تولیدی های مختلف </span>
                    </div>
                </header>
                <!--article box post start -->
                <div class="main-content-box-slider owl-carousel owl-theme">

                    @foreach($chepestprice as $keychepest=>$rowchepest)

                        <?php $imageschepest=explode(',',$rowchepest->imageproduct->images)[1] ?>

                        <div class="item">
                            <article class="post-item  mt-5 text-center">
                                <header>
                                    <div class="post-image">
                                        <figure>
                                            <img src="/images/imageproducts/{{$imageschepest}}"
                                                 alt="slider">
                                        </figure>
                                    </div>
                                </header>
                                <div class="post-title">

                                    <h3>
                                        <a href="#">{{$rowchepest->name}}</a>
                                    </h3>

                                    <p class="describtion"><?php echo $rowchepest->describtion; ?></p>

                                    <p class="price">{{$rowchepest->price}} تومان </p>

                                </div>
                            </article>
                        </div>


                    @endforeach

                </div>
                <!--article box post end-->
            </section>
            <!--content main box slider end -->


        </div>
        <!--content end -->

    </div>

</div>
