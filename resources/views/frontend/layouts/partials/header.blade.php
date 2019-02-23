<header>
      <div class="container">
        <div class="header">
          <div class="row align-items-center">
            <div class="col-lg-4"><a class="logo" href="{{route('frontend.index')}}"><img src="{!!asset('html/images/logo.svg')!!}" alt="Logo"></a><a class="header__toggle" href="#"><span></span><span></span><span></span><span></span></a></div>
            <div class="col-lg-4">
              <div class="wrapMenu">
                <div class="menuMain">
                  <ul class="nav-menu">
                    {!! \App\Models\MenuItem::createMenu() !!}
                  </ul>
                </div>
              </div>
            </div>
            @auth('customer')
                <div class="col-lg-4">
                    <div class="header__login">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="background-image: url({{ asset('/images/icon-user.png') }})"> <span>  {{ str_limit($composer_customer->customer_info->first_name, 9) ?? $composer_customer->customer_info->first_name }}</span></span>
                            </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#" onclick="displayModal('inforModal') "> 
                                <span style="background-image: url({{ asset('html/images/icon-edit.png') }})"></span>
                                <span>Thêm Xe</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('frontend.customer.infor',$composer_customer->id) }}"> 
                                <span style="background-image: url({{ asset('html/images/icon-house.png') }})"></span>
                                <span>Tin của bạn</span>
                            </a>
                            <a class="dropdown-item" href=" {{ route('frontend.logout') }} "> 
                                <span style="background-image: url({{ asset('html/images/icon-logout.png') }})"></span>
                                <span>Logout</span>
                            </a>
                        </div>
                        </div>
                        <a href="{{ route('frontend.ticket') }}" style="margin-left: 22px"><span class=" icon_cart_alt "></span> Giỏ Vé <sup style="color: red;" class="count_ticket">({{ (\Cart::count())?\Cart::count():"0" }})</sup>  </a>
                        
                    </div>
                </div>
            @else
            <div class="col-lg-4">
              <div class="header__login">
                <div class="signInOut">
                  <a href="#" data-toggle="modal" onclick="displayModal('loginModal') "> {{ trans('frontend.header.login.title') }} </a>
                  <a href="#" data-toggle="modal" onclick="displayModal('signUpModal') "> {{ trans('frontend.header.signup.title') }} </a>
                  <a href="{{ route('frontend.ticket') }}" style="margin-left: 22px"><span class=" icon_cart_alt "></span> Giỏ Vé <sup style="color: red;" class="count_ticket">({{ (\Cart::count())?\Cart::count():"0" }})</sup>  </a>
                </div>
                  </div>
              </div>
            </div>
            @endauth
          </div>
        </div>
      </div>
    </header>