@extends('layouts.alluserfactory.index')


@section('content')


    <div class="container mt-3">

        <div class="row">

            <!--sidebar start -->

            <div class="col-12 col-md-12 col-lg-3">

                <aside class="sidebar-home" id="sidebar1">


                    <!--sidebar ads start-->

                @include('layouts.slider.advertimage')

                <!--sidebar ads end-->


                    <!---filter start --->

                    <div class="filter">

                        <div class="filter-header">

                            <h3>فیلتر کنید </h3>

                        </div>

                        <div class="filter-first-header">
                            <p>براساس شهر</p>
                        </div>

                        <div class="filter-first-content mt-3">

                            <div>

                                <select v-model="city" class="form-select" aria-label="Default select example">

                                    <option value="0" > همه</option>
                                    <option value="1">تهران</option>
                                    <option value="2">گیلان</option>
                                    <option value="3">آذربایجان شرقی</option>
                                    <option value="4">خوزستان</option>
                                    <option value="5">فارس</option>
                                    <option value="6">اصفهان</option>
                                    <option value="7">خراسان رضوی</option>
                                    <option value="8">قزوین</option>
                                    <option value="9">سمنان</option>
                                    <option value="10">قم</option>
                                    <option value="11">مرکزی</option>
                                    <option value="12">زنجان</option>
                                    <option value="13">مازندران</option>
                                    <option value="14">گلستان</option>
                                    <option value="15">اردبیل</option>
                                    <option value="16">آذربایجان غربی</option>
                                    <option value="17">همدان</option>
                                    <option value="18">کردستان</option>
                                    <option value="19">کرمانشاه</option>
                                    <option value="20">لرستان</option>
                                    <option value="21">بوشهر</option>
                                    <option value="22">کرمان</option>
                                    <option value="23">هرمزگان</option>
                                    <option value="24">چهارمحال و بختیاری</option>
                                    <option value="25">یزد</option>
                                    <option value="26">سیستان و بلوچستان</option>
                                    <option value="27">ایلام</option>
                                    <option value="28">کهگلویه و بویراحمد</option>
                                    <option value="29">خراسان شمالی</option>
                                    <option value="30">خراسان جنوبی</option>
                                    <option value="31">البرز</option>

                                </select>

                            </div>

                            <div style="text-align: center" class="mt-3">

                                <span class="btn btn-primary" @click="opratefilter()">اعمال فیلتر</span>

                            </div>

                        </div>


                    </div>


                    <!---filter end --->


                    <!--tabs post start -->

                @include('layouts.slider.slidertabs')

                <!--tabs post end -->


                    <!--post blog start-->

                @include('layouts.slider.lastcomment')

                <!--post blog end-->

                </aside>

            </div>

            <!---slider end -->


            @include('alluserfactory.maincontent')


        </div>

    </div>


@endsection


<style type="text/css">

    .form-select:focus {

        box-shadow: 0px 0px 5px 1px #86b7fe !important;
    }

</style>
