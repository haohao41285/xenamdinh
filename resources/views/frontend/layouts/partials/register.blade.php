<div class="modal fade loginForm" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" >
                   <div class=" register-wrap text-center" style="background-image:url('{{asset('html/images/car-login1.jpg')}}'); ">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove btn-remove-modal"></i></button>
                    <div class="register-html-edit text-center">
                      <input id="a" type="radio" name="tab" class="sign-in"><label for="a" class="tab" style="color: #fff">Đăng Kí</label>
                      <div class="register-form-edit">
                        <div class="sign-in-html">
                        <form action="{{route('frontend.registry')}}" method="POST" id="customer_login">
                          @csrf
                          <div class="group row">
                            <div class="col-md-6">
                              <label for="lastname" class="label">Họ</label>
                              <input id="lastname" type="text" class="input form-control form-control-sm" name="customer_info[customer_lastname]" placeholder="Họ">
                            </div>
                            <div class="col-md-6">
                              <label for="firstname" class="label">Tên</label>
                              <input id="firstname" type="text" class="input form-control form-control-sm" name="customer_info[customer_firstname]" placeholder="Tên">
                            </div>
                            
                          </div>
                          <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="text" name="customer[email]" class="input form-control form-control-sm" placeholder="Email">
                          </div>
                          <div class="group row">
                            <div class="col-sm-6 text-center">
                              <input id="nam" type="radio" checked value="1" name="customer_info[customer_gender]">
                                <label for="nam" style="color: #fff">Nam</label>
                            </div>
                            <div class="col-sm-6 text-center">
                              <input id="nu" type="radio" value="0" name="customer_info[customer_gender]">
                                <label for="nu" style="color: #fff">Nữ</label>
                            </div>
                          </div>
                          <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input form-control form-control-sm" name="customer[password]" data-type="password" placeholder="Password">
                            <span class="glyphicon glyphicon-eye-close eye-password"></span>
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn btn-sm" value="Đăng Nhập">
                          </div>
                        </form>
                          <div class="social-network">
                            <span>Hoặc Bằng</span>
                          </div>
                          <div class="group">
                            <input type="button" class="button btn btn-sm facebook-btn" value="Facebook">
                          </div>
                          <div class="hr"></div>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
</div>
