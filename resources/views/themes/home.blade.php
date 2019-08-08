@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
    .weather{
        font-size: 12px;
    }
    .weather img{
        width: 30%;
    }
    .date_weather{
        line-height: 40px;
    }
    .weather-box{
        border: 1px #ccc solid;
    }
</style>
@stop
@section('content')
<!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div style="border:0.5px red solid;width: 97.5%;margin-left: .8em;margin-bottom: 10px">
                google ads
            </div>
                <div class="news">
                    <div class="news-grids">
                        <div class="col-md-8 news-grid-left">
                            <h3>Xe được yêu thích nhất</h3>
                            <div class="row list-car-feauture" >
                                <div class="col-md-4">
                                    <img src="http://i.imgur.com/sDLIAZD.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="http://i.imgur.com/sDLIAZD.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="http://i.imgur.com/sDLIAZD.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="http://i.imgur.com/sDLIAZD.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="http://i.imgur.com/sDLIAZD.png" alt="">
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="http://i.imgur.com/sDLIAZD.png" alt="" style="opacity: .4">
                                    <h5 style="position: absolute;top: 35%;right: 40%;font-size: 3em"><b>+4</b></h5>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4 news-grid-right">
                            <div class="news-grid-rght1">
                            <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a class="high" href="#home" aria-controls="home" role="tab" data-toggle="tab">Thời Tiết</a></li>
                                <li role="">
                                    <select name="" class="form-control">
                                        <option value="">Nam Định</option>
                                        <option value="">Hà Nội</option>
                                        <option value="">Tp.Hồ Chí Minh</option>
                                    </select>
                                </li>
                              </ul>

                              <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="col-md-12 tab-pane active london weather-box" id="home">
                                        <div class="col-md-6 date_weather">
                                            {!!$weather->date_time!!}
                                        </div>
                                        <div class="col-md-6 weather">
                                            {!!$weather->weather_detail!!}
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <iframe src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            <!-- //news-and-events -->
            <div class="move-text">
                <div class="breaking_news">
                    <h2>Tin Mới Nhất</h2>
                </div>
                <div class="marquee">
                    @foreach($news_list as $news)
                        <div class="marquee1"><a class="breaking" href="{{$news->href}}">{{$news->title}}</a></div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <script type="text/javascript" src="js/jquery.marquee.js"></script>
                <script>
                  $('.marquee').marquee({ pauseOnHover: true });
                  //@ sourceURL=pen.js
                </script>
            </div>
            <!-- video-grids -->
                <div class="video-grids">
                    <div class="col-md-8 video-grids-left">
                        <div class="video-grids-left1">
                            <img src="{{$news_hot->image}}" alt=" " class="img-responsive" />
                            <div class="video-grid-pos">
                                <h3>{{$news_hot->title}}</h3>
                                <ul>
                                    <li>9:32 <label>|</label></li>
                                    <li><i>{{$news_hot->cate->cate_news_name}}</i> <label>|</label></li>
                                    <li><span>{{timeToString($news_hot->updated_at)}}</span></li>
                                </ul>
                            </div>

                                <!-- pop-up-box -->
                                <script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
                                <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
                                <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                                <!--//pop-up-box -->
                                <div id="small-dialog" class="mfp-hide">
                                    <iframe src="" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                    $('.popup-with-zoom-anim').magnificPopup({
                                        type: 'inline',
                                        fixedContentPos: false,
                                        fixedBgPos: true,
                                        overflowY: 'auto',
                                        closeBtnInside: true,
                                        preloader: false,
                                        midClick: true,
                                        removalDelay: 300,
                                        mainClass: 'my-mfp-zoom-in'
                                    });
                                                                                                    
                                    });
                                </script>
                        </div>
                        <div class="video-grids-left2">
                            <div class="course_demo1">
                                <ul id="flexiselDemo1">
                                    @foreach($news_list as $key => $news)
                                        <li>
                                            <div class="item">
                                                <img src="{{$news->image}}" alt=" " class="img-responsive" />
                                                
                                                <div id="small-dialog" class="mfp-hide">
                                                    <iframe src="" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                </div>
                                                <div class="floods-text">
                                                    <h3>{{$news->title}}<span>{{$news->cate->cate_news_name}}<label>|</label> <i>{{timeToString($news->updated_at)}}</i></span></h3>
                                                </div>
                                            </div>
                                        </li>
                                        @if($key ==3 || $key == 6 || $key == 9)
                                        <li>
                                            <div class="item" style="border:.5px solid red;margin: .5em .3em">
                                                    google ads
                                            </div>
                                        </li>
                                        @endif
                                    @endforeach
                                    
                                </ul>
                            </div>
                                            <!-- pop-up-box -->
                                                <script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
                                                <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
                                                <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                                            <!--//pop-up-box -->
                                            <script>
                                                $(document).ready(function() {
                                                $('.popup-with-zoom-anim').magnificPopup({
                                                    type: 'inline',
                                                    fixedContentPos: false,
                                                    fixedBgPos: true,
                                                    overflowY: 'auto',
                                                    closeBtnInside: true,
                                                    preloader: false,
                                                    midClick: true,
                                                    removalDelay: 300,
                                                    mainClass: 'my-mfp-zoom-in'
                                                });
                                                                                                                
                                                });
                                            </script>
                                    <!-- requried-jsfiles-for owl -->
                                        <script type="text/javascript">
                             $(window).load(function() {
                                $("#flexiselDemo1").flexisel({
                                    visibleItems: 4,
                                    animationSpeed: 1000,
                                    autoPlay: true,
                                    autoPlaySpeed: 3000,            
                                    pauseOnHover: true,
                                    enableResponsiveBreakpoints: true,
                                    responsiveBreakpoints: { 
                                        portrait: { 
                                            changePoint:480,
                                            visibleItems: 1
                                        }, 
                                        landscape: { 
                                            changePoint:640,
                                            visibleItems: 2
                                        },
                                        tablet: { 
                                            changePoint:768,
                                            visibleItems: 3
                                        }
                                    }
                                });
                                
                             });
                              </script>
                             <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                        </div>
                    </div>
                    <div class="col-md-4 video-grids-right">
                        <div class="sap_tabs">  
                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                <ul class="resp-tabs-list">
                                    <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Mới Nhất</span></li>
                                    <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>Đọc Nhiều</span></li>
                                    <div class="clear"></div>
                                </ul>                    
                                <div class="resp-tabs-container">
                                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                        @foreach($news_most_read as $key => $news)
                                            <div class="facts">
                                                <div class="tab_list">
                                                    <img src="{{$news->image}}" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="tab_list1">
                                                    <ul>
                                                        <li><a href="#">{{$news->cate->cate_news_name}}</a> <label>|</label></li>
                                                        <li>{{timeToString($news->updated_at)}}</li>
                                                    </ul>
                                                    <p><a href="{{$news->href}}">{{$news->title}}</a></p>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            @if($key == 2 || $key == 4)
                                            <div class="facts" style="height: 98.25px">
                                                goolge ads
                                                <div class="clearfix"> </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                        <div class="facts">
                                            <div class="tab_list">
                                                <img src="images/12.jpg" alt=" " class="img-responsive" />
                                            </div>
                                            <div class="tab_list1">
                                                <ul>
                                                    <li><a href="#">Blogger</a> <label>|</label></li>
                                                    <li>30.03.2016</li>
                                                </ul>
                                                <p><a href="#">Nam libero tempore, cum soluta nobis.</a></p>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="facts">
                                            <div class="tab_list">
                                                <img src="images/11.jpg" alt=" " class="img-responsive" />
                                            </div>
                                            <div class="tab_list1">
                                                <ul>
                                                    <li><a href="#" class="orange1">business</a> <label>|</label></li>
                                                    <li>30.03.2016</li>
                                                </ul>
                                                <p><a href="#">Nam libero tempore, cum soluta nobis.</a></p>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="facts">
                                            <div class="tab_list">
                                                <img src="images/10.jpg" alt=" " class="img-responsive" />
                                            </div>
                                            <div class="tab_list1">
                                                <ul>
                                                    <li><a href="#" class="orange2">world</a> <label>|</label></li>
                                                    <li>30.03.2016</li>
                                                </ul>
                                                <p><a href="#">Nam libero tempore, cum soluta nobis.</a></p>
                                            </div>
                                          <div class="clearfix"> </div>
                                        </div>
                                        <div class="facts">
                                            <div class="tab_list">
                                                <img src="images/12.jpg" alt=" " class="img-responsive" />
                                            </div>
                                            <div class="tab_list1">
                                                <ul>
                                                    <li><a href="#" class="green">international</a> <label>|</label></li>
                                                    <li>30.03.2016</li>
                                                </ul>
                                                <p><a href="#">Nam libero tempore, cum soluta nobis.</a></p>
                                            </div>
                                          <div class="clearfix"> </div>
                                        </div>
                                        <div class="facts">
                                            <div class="tab_list">
                                                <img src="images/11.jpg" alt=" " class="img-responsive" />
                                            </div>
                                            <div class="tab_list1">
                                                <ul>
                                                    <li><a href="#" class="orange">general</a> <label>|</label></li>
                                                    <li>30.03.2016</li>
                                                </ul>
                                                <p><a href="#">Nam libero tempore, cum soluta nobis.</a></p>
                                            </div>
                                          <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#horizontalTab').easyResponsiveTabs({
                                            type: 'default', //Types: default, vertical, accordion           
                                            width: 'auto', //auto or any width like 600px
                                            fit: true   // 100% fit in a container
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            <!-- //video-grids -->
            <div class="col-md-12 text-center"  style="height: 100px;width: 97.5%;border: .5px red solid;margin-left: .8em">
                google ads
            </div>
        </div>
    </div>
    
<!-- //banner-bottom -->
@stop
@section('script')
<script></script>
@stop