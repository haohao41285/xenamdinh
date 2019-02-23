 <div class="modal fade loginForm" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: url({{ asset('html/images/bg-login.png') }} ") no-repeat bottom;>
     <button class="close"  type="button" data-dismiss="modal" aria-label="Close"><i class="icon_close"></i></button>
      <div class="modal-body"> 
        @include('frontend.layouts.partials.message',["type" => "modal_signup"])
        <form action="{{ route('frontend.registry') }}" id="form_sign_up" method="POST" >
                  {{ csrf_field() }}
           <div class="form-style form-style--2">
              <h4 class="heading--5">{{ trans('frontend.header.signup.title') }}</h4>
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control" name="customer_info[last_name]" type="text" placeholder="{{ trans('frontend.header.signup.last_name') }}">
                  <input class="form-control" name="customer_info[first_name]" type="text" placeholder="{{ trans('frontend.header.signup.first_name') }} ">
                </div>
                
              </div><br>
                <input  type="radio" name="customer_info[gender]" checked value="1"> {{ trans('frontend.header.signup.gender.1') }} &nbsp
                <input type="radio" name="customer_info[gender]" value="2">{{ trans('frontend.header.signup.gender.2') }} 
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control" name="customer[email]" type="email" placeholder="{{ trans('frontend.header.signup.email') }}">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control" name="customer[password]" id="password" type="password" placeholder="{{ trans('frontend.header.signup.password') }}">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control" name="customer[confirm_password]" id="customer[confirm_password]" type="password" placeholder="{{ trans('frontend.header.signup.confirm_password') }}">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="chu_xe" id="chuXe" type="checkbox">
                    <label class="custom-control-label" for="chuXe" style="color: red!important">{{ trans('frontend.header.signup.chu_xe') }} </label><span>({{ trans('frontend.header.signup.if') }})</span>
                    <input type="hidden" name="customer[customer_ip]" value="{{ \Request::ip() }}">
                  </div>
                </div>
              </div>
              <button class="btn-sign" type="submit" onclick="submitForm('form_sign_up')"><span>{{ trans('frontend.header.signup.title') }}</span></button>
              <div class="heading--6"> <span>{{ trans('frontend.header.signup.or') }}</span></div>
              <div class="row">
                <div class="col-sm-6">
                  <button class="btn-sb btn-fb" type="submit" onclick="location.href='{{ route('frontend.social','facebook') }}'"><i class="fa fa-facebook"></i><span>{{ trans('frontend.header.signup.facebook') }}</span></button>
                </div>
                <div class="col-sm-6">
                  <button class="btn-sb btn-google" type="submit" onclick="location.href='{{ route('frontend.social','google') }}'" ><i class="fa fa-google"></i><span>{{ trans('frontend.header.signup.google') }}</span></button>
                </div>
              </div>
                  <div class="form-group--other">{{ trans('frontend.header.signup.haveAccount') }} <a href="#" onclick="toggleModal('signUpModal','loginModal')">{{ trans('frontend.header.login.title') }}</a>         
                  </div>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>