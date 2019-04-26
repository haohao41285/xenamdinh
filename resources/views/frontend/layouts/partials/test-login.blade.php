<div class="modal fade loginForm" id="inforModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" >			 
			 <div class="login-wrap">
				<div class="login-html text-center"  style="background-image:url('{{asset('html/images/car-login1.jpg')}}'); ">
					<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Xe khách</label>
					<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Taxi</label>
					<div class="login-form">
						<div class="sign-in-htm">
                          <div class="group">
                            <label for="car_name" class="label">Tên xe</label>
                            <input id="car_name" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group row">
                            <div class="col-sm-6">
                              <label for="car_route" class="label">Tuyến</label>
                              <select name="car_route" id="car_route" class="input form-control form-control-sm">
                                <option value="">Hà Nội</option>
                                <option value="">Sài Gòn</option>
                                <option value="">Tây Nguyên</option>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label for="bus_image" class="label">Ảnh Đại Diện</label>
                              <input type="file" id="bus_image"  onchange="readURL(this,'bus_avatar')"  name="bus_image" value="">
                            </div>
                          </div>
                          <div class="group">
                            <img src="" id="bus_avatar" style="width: 50%;display: none" alt="">
                          </div>
                          <div class="group">
                            <label for="car_character" class="label">Số Ghế</label>
                            <input id="car_character" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group">
                            <label for="car_name" class="label">Ngày Đi</label>
                            <div class="select-size">
                              @for ($i = 1; $i < 32; $i++)
                                <input type="checkbox" {{ $i==16?"checked":" " }} name="thoi_gian[thoi_gian_di][]" value="{{ $i }}" id="d{{ $i }}"/>
                              @endfor

                              @for ($i = 1; $i < 32; $i++)
                                <label onclick="checkDate('select-size')" for="d{{ $i }}">{{ $i }}</label>
                              @endfor
                            </div>
                          </div>
                          <div class="group">
                            <label for="car_name" class="label">Ngày Về</label>
                            <div class="select-s">
                              @for ($i = 1; $i < 32; $i++)
                                <input type="checkbox" {{ $i==18?"checked":" " }} value="{{ $i }}" name="thoi_gian[thoi_gian_ve][]" id="n{{ $i }}"/>
                              @endfor

                              @for ($i = 1; $i < 32; $i++)
                                <label onclick="checkDate('select-s')" for="n{{ $i }}">{{ $i }}</label>
                              @endfor
                            </div>
                          </div>
                          <div class="group row">
                            <div class="col-sm-6">
                              <label for="car_city" class="label">Tỉnh</label>
                              <select name="car_city" id="car_city" class="input form-control form-control-sm">
                                <option value=""></option>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label for="car_district" class="label">Huyện</label>
                              <select name="car_district" id="car_district" class="input form-control form-control-sm">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                          <div class="group">
                            <label for="car_ward" class="label">Xã</label>
                            <select name="car_ward" id="car_ward" class="input form-control form-control-sm">
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="group">
                            <label for="car_phone_1" class="label">Liên Hệ 1</label>
                            <input id="car_phone_1" name="car_phone_1" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group">
                            <label for="car_phone_2" class="label">Liên Hệ 2</label>
                            <input id="car_phone_2" name="car_phone_2" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn btn-sm" value="Sign In">
                          </div>
                          <div class="hr"></div>
                        </div>
                        <div class="for-pwd-htm">
                          <div class="group">
                            <label for="car_name" class="label">Tên xe</label>
                            <input id="car_name" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group row">
                            <div class="col-sm-6">
                              <label for="car_route" class="label">Số Ghế</label>
                              <select name="car_route" id="car_route" class="input form-control form-control-sm">
                                <option value="">4</option>
                                <option value="">7</option>
                                <option value="">16</option>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label for="car_image" class="label">Ảnh Đại Diện</label>
                              <input type="file" id="car_image"  onchange="readURL(this,'car_avatar')"   name="car_image" value="">
                            </div>
                          </div>
                          <div class="group">
                            <img src="" id="car_avatar" style="width: 50%;display: none" alt="">
                          </div>
                          <div class="group row">
                            <div class="col-sm-6">
                              <label for="car_city" class="label">Tỉnh</label>
                              <select name="car_city" id="car_city" class="input form-control form-control-sm">
                                <option value=""></option>
                              </select>
                            </div>
                            <div class="col-sm-6">
                              <label for="car_district" class="label">Huyện</label>
                              <select name="car_district" id="car_district" class="input form-control form-control-sm">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                          <div class="group">
                            <label for="car_ward" class="label">Xã</label>
                            <select name="car_ward" id="car_ward" class="input form-control form-control-sm">
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="group">
                            <label for="car_phone_1" class="label">Liên Hệ 1</label>
                            <input id="car_phone_1" name="car_phone_1" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group">
                            <label for="car_phone_2" class="label">Liên Hệ 2</label>
                            <input id="car_phone_2" name="car_phone_2" type="text" class="input form-control-sm form-control">
                          </div>
                          <div class="group">
                            <input type="submit" class="button btn btn-sm" value="Sign In">
                          </div>
                          <div class="hr"></div>
                        </div>
						
					</div>
				</div>
			</div>
</div>
</div>