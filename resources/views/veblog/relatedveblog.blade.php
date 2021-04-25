<div class="related-posts">
    <header class="slicer-box-item-title text-center mb-4">
        <h2 class="d-inline">پر بازدید ترین مطلالب ها</h2>
        <div class="border-des">
            <span>   مطالعه آنان خالی از لطف نیست !</span>
        </div>
    </header>
    <div class="main-slider p-3">


        <div class=" owl-carousel owl-theme">

            @foreach($mostviewer as $key3=>$row3)

                <?php

                $images = explode(',', $row3->images)[1];

                ?>

                <div class="item">
                    <div class="related-post-box">

                        <div class="post-inner">
                            <a href="/veblog/detail/{{$row3->id}}" target="_blank">
                                <figure>
                                    <img src="/images/imageveblog/{{$images}}" alt="">
                                    <svg class="venus-waves" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28"
                                         preserveAspectRatio="none" shape-rendering="auto">
                                        <defs>
                                            <path id="gentle-wave"
                                                  d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                                        </defs>
                                        <g class="parallax">
                                            <use xlink:href="#gentle-wave" x="-12" y="11"
                                                 fill="rgba(255,255,255,0.7"></use>
                                            <use xlink:href="#gentle-wave" x="25" y="13"
                                                 fill="rgba(255,255,255,0.5)"></use>
                                            <use xlink:href="#gentle-wave" x="100" y="5"
                                                 fill="rgba(255,255,255,0.3)"></use>
                                            <use xlink:href="#gentle-wave" x="90" y="7" fill="#fff"></use>
                                        </g>
                                    </svg>
                                </figure>
                            </a>
                            <div class="post-detail">
                                <div class="category ">
                                    <ul>
                                        <li>وبلاگ</li>
                                    </ul>
                                </div>
                                <span>
                                    {{$row3->title}}
                                </span>

                                <div class="d-flex justify-content-evenly mt-2">

                                    <div>

                                        <span class="text-secondary">
                                            <i class="fa fa-eye"></i>
                                        </span>

                                        <span class="text-primary">
                                            {{$row3->viewnumber}}
                                        </span>

                                    </div>

                                    <div>

                                      <span class="text-secondary">
                                            <i class="fa fa-thumbs-up"></i>
                                      </span>


                                        <span class="text-danger">{{$row3->likenumber}}</span>
                                    </div>


                                </div>

                                <div class="author d-flex  justify-content-between">

                                    <div class="author-info">
                                        <div class="author-name">
                                            <span class="text-secondary">
                                                <i class="fa fa-user"></i>
                                             </span>

                                            {{$row3->user->name}}
                                        </div>
                                    </div>

                                    <div class="author-image d-flex mr-3 mt-2">

                                        <span class=" ml-1 text-secondary">
                                            <i class="fa fa-clock"></i>
                                        </span>

                                        <span class="text-success ml-2 ">
                                            {{$row3->date}}
                                        </span>
                                        <span class="text-danger">
                                            {{$row3->hour}}
                                        </span>

                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            @endforeach

        </div>


    </div>
</div>
