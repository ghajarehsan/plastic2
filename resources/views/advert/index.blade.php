@extends('layouts.advert.singleadvert')



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


            @include('advert.maincontent')


        </div>

    </div>


@endsection