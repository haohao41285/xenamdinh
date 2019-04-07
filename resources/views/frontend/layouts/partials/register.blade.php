<div class="modal fade loginForm" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" >
                <form action="" method="POST" id="customer_login">
                  @csrf
                  <div class="register-wrap" style="background-image:url('{{asset('html/images/car-login1.jpg')}}'); ">
                    <div class="register-html text-center">
                      <input id="tab-2" type="radio" name="tab" class="register"><label for="tab-2" class="tab">Đăng Kí</label>
                      <div class="register-form">
                        <div class="sign-in-htm">
                          <div class="group">
                            <label for="user" class="label">Họ tên</label>
                            <input id="user" type="text" class="input form-control-sm form-control" placeholder="abc@gmail.com">
                          </div>
                          <div class="row">
                            <div class="col-sm-6 text-center">
                              <input id="male" type="radio" class="" name="gender" >
                              <label for="male" >Name</label>
                            </div>
                            <div class="col-sm-6 text-center">
                              <input id="female" type="radio" class="" name="gender" >
                              <label for="female">Nữ</label>
                            </div>
                          </div>
                          <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="text" class="input form-control-sm form-control" placeholder="abc@gmail.com">
                          </div>
                          <div class="group">
                            <label for="pass_register" class="label">Password</label>
                            <input id="pass_register" type="password" class="input form-control-sm form-control" data-type="password">
                            <span class="glyphicon glyphicon-eye-close eyes-btn" onclick="changeTypeInput(this,'pass_register') "></span>
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn btn-sm" value="Sign In">
                          </div>
                          <div class="btn-choose">
                            <span class="">Hoặc</span>
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn-facebook btn btn-sm" style="background-color: #3c5899!important;" value="FaceBook">
                          </div>
                          <div class="hr"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
          </div>
</div>
