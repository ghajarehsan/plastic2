@extends('layouts.index.indexlayout')



@section('content')

    <?php

    use App\Lib\Helper;

    $getsetting = Helper::getsetting();

    ?>


    @if(session('registered'))


        <div class="container mt-2 mb-2">

            <p class="alert alert-success text-center">

                ثبت نام شما با موفقیت انجام گردید.

            </p>

        </div>

    @endif

    @if(session('verified'))


        <div class="container mt-2 mb-2">

            <p class="alert alert-success text-center">

                حساب کاربری شما با موفقیت فعال شد

            </p>


        </div>

    @endif

    @if(session('sendemail'))


        <div class="container mt-2 mb-2">

            <p class="alert alert-success text-center">

                ایمیل فعال سازی با موفقیت به ایمیل شما ارسال شد

            </p>

        </div>

    @endif

    @if(session('notverifiedyet'))


        <div class="container mt-2 mb-2">

            <p class="alert alert-danger text-center">

                کاربری شما غیر فعال میباشد
                برای ارسال مجدد ایمیل فعال سازی بروی
                <a href="{{route('sendverifyurl')}}">لینک</a>
                 کلیک کنید

            </p>

        </div>

    @endif



    <main class="main-content mt-4">


        <!--- main content start --->
    @include('index.maincontent')
    <!--- main content end --->

        <!--video list start-->
    @include('index.ourvideo')
    <!--video list end -->


        <!--post blog start-->
    @include('index.veblog')
    <!--post blog end-->


        <!--- use factory start --->
    @include('index.userfactory')
    <!--- use factory end --->


    </main>



@endsection