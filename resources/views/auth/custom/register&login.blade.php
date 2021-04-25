@extends('layouts.register&login.index')



@section('content')


    <div class="main-login-register">
        <div class="container">

            <div class="form-container">
                <div class="sign-signup ">


                    <form action="{{route('login')}}" class="sign-in-form" method="post">
                        <h2 class="title">ورود به حساب کاربری</h2>

                        @if(session('error'))

                            <span class="mb-2 alert alert-danger">

                                ایمیل یا رمز عبور اشتباه میباشد

                            </span>

                        @endif

                        @csrf

                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="far fa-user"></i> </span>
                            <input type="text" class="form-control " placeholder="نام کاربری یا آدرس ایمیل *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                   name="email">
                        </div>


                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg1"><i
                                        class="fas fa-lock"></i> </span>

                            <input type="password" class="form-control" placeholder=" رمز عبور *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg1"
                                   name="password">


                        </div>

                        <div class="d-flex flex-column">

                            @if(count($errors->all()>0))

                                @foreach($errors->all() as $row)

                                    <p class="alert alert-danger">

                                        {{$row}}

                                    </p>

                                @endforeach

                            @endif
                        </div>

                        <button class="custom-button" type="submit">ورود به سایت</button>
                    </form>


                    <form action="{{route('register')}}" method="post" class="sign-up-form">

                        @csrf

                        <h2 class="title">عضویت در سایت</h2>

                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg2"><i
                                        class="far fa-user"></i> </span>
                            <input type="text" class="form-control" placeholder="  نام و نام خانوادگی *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg2"
                                   name="name">
                        </div>


                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg3 "><i
                                        class="fas fa-lock"></i> </span>
                            <input type="text" class="form-control" placeholder="    ایمیل *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg3"
                                   name="email">
                        </div>


                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg3 "><i
                                        class="fas fa-lock"></i> </span>
                            <input type="password" class="form-control" placeholder=" رمز عبور *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg3"
                                   name="password">
                        </div>


                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg3 "><i
                                        class="fas fa-lock"></i> </span>
                            <input type="password" class="form-control" placeholder=" تکرار رمز عبور *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg3"
                                   name="password_confirmation">
                        </div>


                        <div class="input-group input-group-lg mb-3 custom-input-box">
                            <span class="input-group-text" id="inputGroup-sizing-lg3 "><i
                                        class="fas fa-lock"></i> </span>
                            <input type="text" class="form-control" placeholder="   شماره موبایل *"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg3"
                                   name="mobile">
                        </div>


                        <p>اطلاعات شخصی شما برای پردازش سفارش شما استفاده می‌شود، و پشتیبانی از تجربه شما در این وبسایت،
                            و برای اهداف دیگری که در <a href="#" target="_blank">سیاست حفظ حریم خصوصی</a> توضیح داده شده
                            است.</p>


                        <button class="custom-button" type="submit">عضویت</button>

                    </form>


                </div>
            </div>


            <div class="panels-container">

                <div class="panel left-panel">
                    <div class="content">
                        <h3>کاربر جدید هستید؟</h3>
                        <p>
                            آیا درحال حاضر نزد ما ثبت نام کرده اید؟ اگر اینطور نیست برای ثبت نام به بخش کاربران بر روی
                            دکمه زیر کلیک کنید تا بتوانید یک حساب جدید برای خود ثبت کنید .
                        </p>
                        <button type="button" class="btn btn-outline-light" id="sign-up-btn"> ثبت نام در سایت</button>
                    </div>
                    <img src=" " class="image" alt=""/>
                </div>

                <div class="panel right-panel">
                    <div class="content">
                        <h3>قبلا ثبت‌ نام کرده‌اید؟</h3>
                        <p>
                            آیا درحال حاضر نزد ما ثبت نام کرده اید؟ اگر اینطور است برای ورود به بخش کاربران بر روی دکمه
                            زیر کلیک کنید تا بتوانید حساب و سرویس های خود را مدیریت کنید.
                        </p>
                        <button type="button" class="btn btn-outline-light" id="sign-in-btn">ورور به سایت</button>
                    </div>
                    <img src="" class="image" alt=""/>
                </div>
            </div>


        </div>
    </div>




@endsection