@extends('layouts.moreproduct.index')



@section('content')

    <?php


    use App\Lib\Helper;

    $getsetting = Helper::getsetting();

    ?>

    <div class="container mt-3">

        <div class="row">

            <!--sidebar start -->
            <div class="col-12 col-md-12 col-lg-3">
                <aside class="sidebar-home" id="sidebar1">

                    <!--sidebar ads start-->

                @include('layouts.slider.advertimage')

                <!--sidebar ads end-->



                    <!--- fiter start --->

                    <div class="filter">

                        <div class="filter-header">

                            <h3>فیلتر کنید </h3>

                        </div>

                        <div>

                            <div class="filter-first-header">
                                <p>براسال نوع محصول </p>
                            </div>

                            <div class="filter-first-content mt-3">

                                <div class="row">

                                    @foreach(\App\Lib\Helper::getcategory() as  $keycategory=>$rowcategory)

                                        <div class="col-lg-6 brand">

                                            <div>

                                                <input type="checkbox" class="form-check-input" v-model="firstfilter"
                                                       value="{{$rowcategory->id}}">

                                                <span>{{$rowcategory->name}}</span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                        <div class="mt-3">

                            <div class="filter-first-header">
                                <p>براسال قیمت </p>
                            </div>

                            <div class="startprice">

                                <label for="customRange3" class="form-label mt-3"> شروع قیمت از : </label>
                                <input v-model="pricestart" type="range" class="form-range" min="0" max="10000000"
                                       step="100000"
                                       id="customRange3">

                                <span style="color: green;">  @{{ pricestart }}  ریال   </span>

                            </div>

                            <div class="startend">

                                <label for="customRange3" class="form-label mt-3"> الی : </label>
                                <input v-model="priceend" type="range" class="form-range" min="0" max="10000000"
                                       step="100000"
                                       id="customRange3">

                                <span style="color: green;">@{{ priceend }}  ریال     </span>

                            </div>

                        </div>

                        <div class="mt-3">

                            <div class="filter-first-header">
                                <p>براسال سازنده </p>
                            </div>

                            <div class="filter-first-content mt-3">

                                <div class="row">

                                    @foreach(\App\Lib\Helper::getmaker() as  $keymaker=>$rowmaker)

                                        <div class="col-lg-12 brand">

                                            <div>

                                                <input type="checkbox" class="form-check-input" v-model="maker"
                                                       value="{{$rowmaker->id}}">

                                                <span>{{$rowmaker->namefactory}}</span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>


                        </div>


                        <div style="text-align: center" class="mt-3">

                            <span class="btn btn-primary" @click="operate()">اعمال فیلتر</span>

                        </div>

                    </div>

                    <!--- fiter end --->



                    <!--tabs post start -->

                @include('layouts.slider.slidertabs')

                <!--tabs post end -->




                    <!--post blog start-->

                @include('layouts.slider.lastcomment')

                <!--post blog end-->



                </aside>
            </div>
            <!--sidebar end -->


            <!--content start -->
            <div class="col-12 col-md-12 col-lg-9">


                <!--search box start -->
                <div class="main-search-box">
                    <div class="input-group mb-3 input-group-lg ">
                        <input type="text" class="form-control" placeholder="چی میخواهی یاد بگیری ؟ !"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2"> جستجو</button>
                    </div>
                </div>
                <!--search box end -->


                <!--content main  box start -->

                <section class="content-main-box mt-4 p-4 mb-4">
                    <header class="content-main-title">
                        <span class="icon-content"><i class="fas fa-bookmark"></i></span>
                        <h2 class="d-inline"> تمام محصولات شرکت های عضو سایت پلاستیک </h2>

                    </header>
                    <!--article post box start -->
                    <div class="row">


                        <!--article start -->

                        <div v-for="allproduct in allproducts" class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                            <article class="post-box">
                                <header class="post-header">
                                    <figure class="post-image">
                                        <img :src="'/images/imageproducts/'+allproduct.imageproduct.images.split(',')[1]"
                                             alt="مطالب اول">
                                    </figure>
                                </header>
                                <div class="post-content">
                                    <div class="post-entry">
                                        <span class="category">شرکت تولید کننده : <span class="namefactory">@{{ allproduct.user.namefactory }}</span></span>
                                        <h2 class="entry-title">
                                            @{{allproduct.name}}
                                        </h2>
                                    </div>
                                    <div class="post-excerpt">

                                        @{{allproduct.describtion}}

                                    </div>

                                    <div class="price">

                                        <h3>قیمت :</h3>

                                        <span>@{{allproduct.price}} تومان</span>

                                    </div>

                                    <div class="post-more">
                                        <a target="_blank" :href="'product/detail/'+allproduct.id"> اطلاعات بیشتر محصول </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!--article end-->


                    </div>
                    <!--article post box end -->


                    <infinite-loading :identifier="infiniteId" @infinite="infiniteHandler"></infinite-loading>


                </section>

                <!--content main  box end -->


            </div>
            <!--content end -->

        </div>
    </div>


@endsection