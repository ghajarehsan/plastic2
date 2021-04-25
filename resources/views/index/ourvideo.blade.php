<section class="main-content-video-list">
    <div class="container">
        <!--video list header start-->
        <header>
            <div class="text-center head-text-video">
                <h4>مشاهده ویدیو های ما</h4>
                <p> از این آموزش های رایگان ما لذت ببرید</p>
            </div>
        </header>
        <!--video list header end-->
        <!--video list start -->
        <div class="d-flex align-items-start">
            <div class="row">
                <div class="col-7">
                    <div class="tab-content" id="v-pills-tabContent">


                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <video class="video-player-tab" controls>
                                <source src="https://replywp.com/free-video/wordpress-learn/show-realted-posts-in-wordpress/show-realted-posts-in-wordpress.mp4">
                            </video>
                        </div>



                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <video class="video-player-tab2" controls>
                                <source src="https://replywp.com/free-video/wordpress-learn/wordpress-post-views-count/wordpress-post-views-count.mp4">
                            </video>
                        </div>



                    </div>
                </div>
                <div class="col-5">
                    <div class="custom-video-list-tabs">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">

                            @foreach($veblogvideos as $key12=>$row12)

                                <a class="nav-link active" id="v-pills-home-tab2" data-bs-toggle="pill"
                                   href="#v-pills-profile{{$row12->id}}"

                                   role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <img src="/images/imageveblog/<?php echo explode(',', $row12->images)[1]?>">
                                        </div>
                                        <div class="p-2 bd-highlight">

                                            <h4 class="post-title">

                                                {{$row12->title}}

                                            </h4>

                                            <span class="post-date-info">

                                                <i class="fa fa-clock-o"></i>

                                                {{$row12->date}}
                                                {{$row12->hour}}

                                            </span>
                                        </div>
                                    </div>
                                </a>


                            @endforeach


                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!--video list end-->
    </div>
</section>
