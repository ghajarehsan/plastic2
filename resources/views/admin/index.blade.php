@extends('layouts.admin.index')



@section('content')


    <div class="container d-flex justify-content-center" style="text-align: center">

        <div class="col-lg-11 ">

            <div class="menu">

                <div class="container">

                    <div class="menu-right d-flex ">

                        <ul class="d-flex">

                            <li>

                                <a href="/" target="_blank">index</a>

                            </li>

                            <li>

                                <router-link to="/category">مدیریت دسته ها</router-link>

                            </li>

                            <li>

                                <router-link to="/products">مدیریت محصولات</router-link>

                            </li>

                            <li>

                                <router-link to="/adverts">مدیریت آگهی ها</router-link>

                            </li>

                            <li>

                                <router-link to="/productcomments">مدیریت نظرات محصولات</router-link>

                            </li>

                            <li>

                                <router-link to="/advertcomments">
                                    مدیریت نظرات تبلیغات
                                </router-link>

                            </li>

                            <li>

                                <router-link to="/veblogs">
                                    مدیریت وبلاگ ها
                                </router-link>

                            </li>

                            <li>

                                <router-link to="/onlinchat">
                                    چت آنلاین
                                </router-link>

                            </li>


                        </ul>


                    </div>


                </div>


            </div>

            <div class="content mt-3">

                <div class="container ">

                    <div class="main-content ">

                        <router-view></router-view>

                    </div>

                </div>

            </div>


        </div>

    </div>



@endsection