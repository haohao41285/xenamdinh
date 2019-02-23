<div class="modal fade loginForm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document"  style="background: url({{ asset('html/images/bg-login.png') }}) no-repeat bottom;">
            <div class="modal-content" style="background: url({{ asset('html/images/bg-login.png') }}) no-repeat bottom;">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="icon_close"></i></button>
              <div class="modal-body " >

                <h4 class="heading--5"> {{ trans('frontend.header.login.title') }} </h4>
                 @include('frontend.layouts.partials.message',["type" => "modal_login"])
                <form action=" {{ route('frontend.login') }}" method="POST" id="customer_login">
                  {{ csrf_field() }}
                  <div class="form-style">
                    <div class="form-group">
                      <div class="input-group">
                        <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="{{ trans('frontend.header.login.email') }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <input class="form-control" name="password" type="password" placeholder="{{ trans('frontend.header.login.password') }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="customRemember" name="remember_me" type="checkbox">
                          <label class="custom-control-label" for="customRemember">{{ trans('frontend.header.login.remember_me') }}</label>
                        </div>
                      </div>
                      <div class="col-6 text-right"><a href="#">{{ trans('frontend.header.login.forgot') }}</a></div>
                    </div>
                    <button class="btn-sign" type="submit"><span>{{ trans('frontend.header.login.title') }}</span></button>
                    <div class="heading--6"> <span>Hoặc</span></div>
                    <div class="row">
                      <div class="col-6">
                        <button class="btn-sb btn-fb" type="submit" onclick="location.href='{{ route('frontend.social','facebook') }}'"><i class="fa fa-facebook"></i><span>{{ trans('frontend.header.login.facebook') }}</span></button>
                      </div>
                      <div class="col-6">
                        <button class="btn-sb btn-google" onclick="location.href='{{ route('frontend.social','google') }}'"><i class="fa fa-google"></i><span>{{ trans('frontend.header.login.google') }}</span></button>
                      </div>
                    </div>
                    <div class="form-group--other">{{ trans('frontend.header.login.haveNotAccount') }}<a href="#" onclick="toggleModal('loginModal','signUpModal')">{{ trans('frontend.header.signup.title') }}</a></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>