<!-- banner -->
    <div class="banner" style="background:url({{asset('/images/banner_car.jpg')}}) no-repeat 0px 0px;background-size: 100%">
        <div class="banner-info">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                        <div class="logo">
                            <a class="navbar-brand" href="index.html"><span>T</span></a>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav cl-effect-18" id="cl-effect-18">
                            <li class="act"><a href="index.html" class="effect1 active">Trang chủ</a></li>
                            <li role="presentation" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                  Tin tức <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="short-codes.html">Xe Cộ</a></li>
                                  <li><a href="icons.html">Xã Hội</a></li>
                                </ul>
                            </li>
                            <li><a href="events.html">Du lịch</a></li>
                            <li role="presentation" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                  Phương Tiện <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="short-codes.html">Xe Khách</a></li>
                                  <li><a href="icons.html">Taxi</a></li>
                                </ul>
                            </li>
                            <li><a href="events.html">Chăm Sóc Xe</a></li>
                            <li><a href="contact.html">Liên Hệ</a></li>
                            <li data-toggle="modal"  onclick="displayModal('signUpModal')"  data-target="#register_form"><a href="#">register</a></li>
                            <li data-toggle="modal" onclick="displayModal('loginModal')"><a href="#">Login</a></li>
                            {{-- <li data-toggle="modal" onclick="displayModal('inforModal')"><a href="#">Information</a></li> --}}

                        </ul>
                    </div><!-- /.navbar-collapse -->    
                    
                </nav>
                
            </div>
        </div>
    </div>
<!-- banner -->
