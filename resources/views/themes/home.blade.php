@extends('frontend.layouts.master')
@section('content')
<!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="move-text">
                <div class="breaking_news">
                    <h2>Tin Mới Nhất</h2>
                </div>
                <div class="marquee">
                    <div class="marquee1"><a class="breaking" href="single.html">A 5-year-old boy who recently returned to the U.S from Ebola-stricken West Africa is under observation after experiencing a fever.</a></div>
                    <div class="marquee2"><a class="breaking" href="single.html">The surprisingly successful president of the Philippines and peacemaking in the Philippines: Shaking it all up.</a></div>
                    <div class="clearfix"></div>
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
                            <img src="images/9.jpg" alt=" " class="img-responsive" />
                            <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                                    <span> </span>
                            </a>
                            <div class="video-grid-pos">
                                <h3><span>Bellevue</span>  Towers in Dubai Downtown UAE</h3>
                                <ul>
                                    <li>9:32 <label>|</label></li>
                                    <li><i>Adom Smith</i> <label>|</label></li>
                                    <li><span>Blogger</span></li>
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
                                    <li>
                                        <div class="item">
                                            <img src="images/10.jpg" alt=" " class="img-responsive" />
                                            <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                                                    <i> </i>
                                            </a>
                                            <div id="small-dialog" class="mfp-hide">
                                                <iframe src="" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                            <div class="floods-text">
                                                <h3>The fed and inequality <span>Blogger <label>|</label> <i>Adom Smith</i></span></h3>
                                                <p>5:56</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="images/11.jpg" alt=" " class="img-responsive" />
                                            <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                                                    <i> </i>
                                            </a>
                                            <div id="small-dialog" class="mfp-hide">
                                                <iframe src="" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                            <div class="floods-text">
                                                <h3>The fastest insect in the world <span>Blogger <label>|</label> <i>Adom Smith</i></span></h3>
                                                <p>5:56</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="images/12.jpg" alt=" " class="img-responsive" />
                                            <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                                                    <i> </i>
                                            </a>
                                            <div id="small-dialog" class="mfp-hide">
                                                <iframe src="" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                            <div class="floods-text">
                                                <h3>Billionaires versus Millionaires<span>Blogger <label>|</label> <i>Adom Smith</i></span></h3>
                                                <p>5:56</p>
                                            </div>
                                        </div>
                                    </li>
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
                                    visibleItems: 3,
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
                                        <div class="facts">
                                            <div class="tab_list">
                                                <img src="images/10.jpg" alt=" " class="img-responsive" />
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
                                                    <li><a href="#" class="green">international</a> <label>|</label></li>
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
                                                    <li><a href="#" class="orange">general</a> <label>|</label></li>
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
                                                    <li><a href="#" class="orange1">business</a> <label>|</label></li>
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
                                                    <li><a href="#" class="orange2">world</a> <label>|</label></li>
                                                    <li>30.03.2016</li>
                                                </ul>
                                                <p><a href="#">Nam libero tempore, cum soluta nobis.</a></p>
                                            </div>
                                          <div class="clearfix"> </div>
                                        </div>
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
            
            <!-- news-and-events -->
                <div class="news">
                    <div class="news-grids">
                        <div class="col-md-8 news-grid-left">
                            <h3>Loại xe</h3>
                            <div class="row list-cate">
                            	<div class="col-md-4 text-center">
                            		<a href="" title=""><img src="{{asset('images/car_png1.jpg')}}" alt=""></a>
                            		<a href="" title=""><h4>Taxi</h4></a>
                            	</div>
                            	<div class="col-md-4 text-center">
                            		<a href="" title=""><img src="{{asset('images/truck_png1.png')}}" alt=""></a>
                            		<a href="" title=""><h4>Xe Tải</h4></a>
                            	</div>
                            	<div class="col-md-4 text-center">
                            		<a href="" title=""><img src="{{asset('images/bus_png1.png')}}" alt=""></a>
                            		<a href="" title=""><h4>Xe Khách</h4></a>
                            	</div>
                            </div>
                        </div>
                        <div class="col-md-4 news-grid-right">
                            <div class="news-grid-rght1">
                            <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a class="high" href="#home" aria-controls="home" role="tab" data-toggle="tab">Thời Tiết Khu Vực</a></li>
                                <li role="presentation"><a href="#" aria-controls="profile" role="tab" data-toggle="tab">Nghĩa Hưng</a></li>
                              </ul>

                              <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active london" id="home">
                                        <ul>
                                            <li>
                                                <h4>Wednesday</h4>
                                                <span></span>
                                                <p>21<sup>°</sup></p>
                                            </li>
                                            <li>
                                                <h4>Thursday</h4>
                                                <span class="moon"></span>
                                                <p>25<sup>°</sup></p>
                                            </li>
                                            <li>
                                                <h4>Friday</h4>
                                                <span class="sun"></span>
                                                <p>31<sup>°</sup></p>
                                            </li>
                                            <div class="clearfix"> </div>
                                        </ul>
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
        </div>
    </div>
<!-- //banner-bottom -->
@endsection