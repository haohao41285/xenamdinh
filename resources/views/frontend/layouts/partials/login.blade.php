<div class="modal fade loginForm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" >
            <form action="" method="POST" id="customer_login">
                  @csrf
                   <div class=" login-edit text-center" style="background-image:url('{{asset('html/images/car-login1.jpg')}}'); "><span class="remove-btn">X</span>
                    <div class="login-html-edit">

                      <input id="tab_signin" type="radio" name="tab" class="sign-in" checked><label for="tab_signin" class="tab">Đăng Nhập</label>
                      <input id="tab_forget" type="radio" name="tab" class="for-pwd"><label for="tab_forget" class="tab">Quên Mật Khẩu</label>
                      <div class="login-form-edit">
                        <div class="sign-in-htm">
                          <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="text" class="input form-control form-control-sm" placeholder="Email">
                          </div>
                          <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input form-control form-control-sm" data-type="password" placeholder="Password">
                            <span class="glyphicon glyphicon-eye-close eye-password"></span>
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn btn-sm" value="Đăng Nhập">
                          </div>
                          <div class="social-network">
                            <span>Hoặc Bằng</span>
                          </div>
                          <div class="group">
                            <input type="button" class="button btn btn-sm facebook-btn" value="Facebook">
                          </div>
                          <div class="hr"></div>
                        </div>
                        <div class="for-pwd-htm">
                          <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="text" class="input form-control form-control-sm">
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn btn-sm" value="Gửi">
                          </div>
                          <div class="hr"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
          </div>
</div>