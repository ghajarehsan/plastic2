<?php

use App\Lib\Helper;

$lastveblog = Helper::getlastveblog();

?>


<div class="widget-post-box">
    <div class="widget">
        <h5 class="widget-title">آخرین مطالب سایت</h5>
    </div>
    <div class="sidebar-widget-content">
        <ul>

            @foreach($lastveblog as $key=>$row)

                <?php

                $image = explode(',', $row->images)[1];

                ?>

                <li>
                    <a href="/veblog/detail/{{$row->id}}" target="_blank">
                    <div class="widget-thumb">

                        <img width="100" height="75" src="/images/imageveblog/{{$image}}">

                    </div>

                    <div class="widget-content-title">

                            {{$row->title}}

                    </div>


                    <div class="widget_excerpt">
                        <?php echo $row->description ?>
                    </div>

                    <div class="widget-meta">
                        <span class="wmt-datetime-meta">

                            <i class="fa fa-calendar-alt"></i>

                            {{$row->date}}

                        </span>

                        <span class="wmt-comment-meta">

                                <i class="fa fa-eye"></i>

                                {{$row->viewnumber}}

                           </span>

                        <span class="wmt-comment-meta">

                                <i class="fa fa-thumbs-up"></i>

                                {{$row->likenumber}}

                           </span>


                        <span class="wmt-author-meta">

                                <i class="fa fa-user"></i>

                                {{$row->user->name}}

                            </span>

                    </div>
                    </a>
                </li>

            @endforeach

        </ul>
    </div>
</div>
