<div class="modal fade loginForm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" >
            <div class="modal-content" >
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="icon_close"></i></button>
              <div class="modal-body " >

                <h4 class="heading--5"> Login </h4>
                <form action="" method="POST" id="customer_login">
                  @csrf
                  <div class="form-style">
                    <div class="form-group">
                        <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" type="password" placeholder="Password">
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="customRemember" name="remember_me" type="checkbox">
                          <label class="custom-control-label" for="customRemember">Remember</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-right"><a href="#">Quên mật khẩu ?</a></div>
                    </div>
                    <button class="btn-sign" type="submit"><span>Login</span></button>
                    <div class="heading--6"> <span>Hoặc</span></div>
                    <div class="row">
                      <div class="">
                        <button class="btn-sb btn-fb" type="submit" onclick="location.href='#'"><i class="fa fa-facebook"></i><span>Facebook</span></button>
                      </div>
                    </div>
                    <div class="form-group--other">Bạn chưa có tài khoản?<a href="#" onclick="toggleModal('loginModal','signUpModal')" >Register</a></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
</div>
