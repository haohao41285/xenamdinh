<div class="modal fade infoForm" id="inforModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document" style="background: url({{ asset('html/images/bg-login.png') }});">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="icon_close"></i></button>
              <h4 class="heading--5">{{ trans('frontend.header.info.title') }}</h4>
              <h4 class="heading--6">{{ trans('frontend.header.info.toila') }}</h4>
              <span>{{ trans('frontend.required') }}</span>
            </div>
            <div class="modal-content" style="background: url({{ asset('html/images/bg-login.png') }}); no-repeat bottom;">
              <div class="modal-body">
                @include("frontend.layouts.partials.message", ["type" => "modal_information"])
                <ul class="nav nav-tabs nav-modal" id="myTab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="form-tab-2" data-toggle="tab" href="#formTab-2" role="tab" aria-controls="home" aria-selected="false">{{ trans('frontend.header.info.xe_khach.title') }}</a></li>
                  <li class="nav-item"><a class="nav-link" id="form-tab-3" data-toggle="tab" href="#formTab-3" role="tab" aria-controls="home" aria-selected="false">{{ trans('frontend.header.info.taxi.title') }}</a></li>
                  <li class="nav-item"><a class="nav-link" id="form-tab-4" data-toggle="tab" href="#formTab-4" role="tab" aria-controls="home" aria-selected="false">{{ trans('frontend.header.info.xe_tai.title') }}</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="formTab-2" role="tabpanel" aria-labelledby="form-tab-2">
                  <form action="{{ route('frontend.registryCar','xe_khach') }}"
                   method="POST" id="form_xe_khach" enctype="multipart/form-data" >
                   {{ csrf_field() }}
                    <div class="form-style">
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-email">*</i>

                          <input class="form-control form-control-bg" name="xe[ten_xe]" type="text" placeholder="{{ trans('frontend.header.info.ten_nha_xe') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt"><i class="ic-user"></i>
                              <label for="">{{trans('frontend.header.info.xe_khach.tuyen') }}</label><br>
                              <select class="form-control" name="xe[tuyen_id]">
                                @foreach($composer_tuyen as $t)
                                <option value="{{ $t->id }}">{{ $t->ten_tuyen }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group-ipt"><i class="ic-user"></i>
                              <label for="ava">{{ trans('frontend.header.info.ava') }}</label>
                              <input id="ava" name="xe[ava]" onchange="readURL(this,'ava_xe_khach')"  type="file">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <img style="width: 100%;height:100%;display: none; " src="#" id="ava_xe_khach" alt="">
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-pass"></i>
                          <label for="">{{ trans('frontend.header.info.xe_khach.so_ghe') }}</label>
                          <select name="xe[so_cho]" class="form-control">
                            <option value="16">16</option>
                            <option selected value="45">45</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>{{ trans('frontend.header.info.xe_khach.ngay_di') }}</label><i>*</i>
                      </div>
                      <div class="select-size">
                        @for ($i = 1; $i < 32; $i++)
                          <input type="checkbox" {{ $i==16?"checked":" " }} name="thoi_gian[thoi_gian_di][]" value="{{ $i }}" id="d{{ $i }}"/>
                        @endfor

                        @for ($i = 1; $i < 32; $i++)
                          <label onclick="checkDate('select-size')" for="d{{ $i }}">{{ $i }}</label>
                        @endfor
                      </div>

                      <div class="form-group">
                        <label>{{ trans('frontend.header.info.xe_khach.ngay_ve') }}</label><i>*</i>
                      </div>
                      <div class="select-s">
                        @for ($i = 1; $i < 32; $i++)
                          <input type="checkbox" {{ $i==18?"checked":" " }} value="{{ $i }}" name="thoi_gian[thoi_gian_ve][]" id="n{{ $i }}"/>
                        @endfor

                        @for ($i = 1; $i < 32; $i++)
                          <label onclick="checkDate('select-s')" for="n{{ $i }}">{{ $i }}</label>
                        @endfor
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="">Tỉnh/Thành Phố</label><br>

                              <select class="form-control" onchange="changeProvince('province_xk','distric_xk') " name="xe[tinh]" id="province_xk">
                              @foreach($composer_province as $list)
                                <option  value="{{ $list['province_id'] }}">{{ $list['title'] }}</option>
                              @endforeach
                              </select>

                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="ava">Quận/Huyện</label>
                              <select class="form-control" onchange="changeProvince('distric_xk','ward_xk','yes') " name="xe[huyen]" id="distric_xk">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="ava">Phường/Xã</label>
                              <select class="form-control"  name="xe[xa]" id="ward_xk">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-agency">*</i>
                          <input class="form-control form-control-bg" type="text" name="xe[lien_he_1]" placeholder="{{ trans('frontend.header.info.lien_he_1') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-agency"></i>
                          <input class="form-control form-control-bg" name="xe[lien_he_2]" type="text" placeholder="{{ trans('frontend.header.info.lien_he_2') }}">
                        </div>
                      </div>
                      <div class="form-group">
                          <script src="https://www.recaptcha.net/recaptcha/api.js?hl=en" async defer></script>
                                    <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
                                    <noscript>
                                    <div>
                                        <div style="width: 302px; height: 422px; position: relative;">
                                        <div style="width: 302px; height: 422px; position: absolute;">
                                            <iframe src="https://www.google.com/recaptcha/api/fallback?k={{ env('NOCAPTCHA_SITEKEY') }}"
                                                    frameborder="0" scrolling="no"
                                                    style="width: 302px; height:422px; border-style: none;">
                                            </iframe>
                                        </div>
                                        </div>
                                        <div style="width: 300px; height: 60px; border-style: none;
                                                    bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px;
                                                    background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                                    class="g-recaptcha-response"
                                                    style="width: 250px; height: 40px; border: 1px solid #c1c1c1;
                                                            margin: 10px 25px; padding: 0px; resize: none;" >
                                        </textarea>
                                        </div>
                                    </div>
                                    </noscript>
                      </div>
                      <div class="form-group">
                        <button class="btn-sign" type="submit"><span>{{ trans('frontend.header.info.hoan_thanh') }}</span></button>
                      </div>
                    </div>
                  </form>
                  </div>

                  {{-- Taxi --}}
                  <div class="tab-pane fade" id="formTab-3" role="tabpanel" aria-labelledby="form-tab-3">
                    <form action="{{ route('frontend.registryCar','taxi') }}" method="POST" id="form_taxi" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="form-style">
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-email">*</i>
                          <input class="form-control form-control-bg" type="text" name="ten_xe" placeholder="{{ trans('frontend.header.info.ten_nha_xe') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt"><i class="ic-user">*</i>
                              <label for="">{{ trans('frontend.header.info.taxi.so_ghe') }}</label>
                              <select class="form-control" name="so_cho">
                                <option selected value="4">4</option>
                                <option value="7">7</option>
                                <option value="12">12</option>
                                <option value="16">16</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group-ipt"><i class="ic-user"></i>
                              <label>{{ trans('frontend.header.info.ava') }}</label>
                              <input name="ava" onchange="readURL(this,'ava_taxi')" type="file">

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <img style="width: 100%;height:100%;;display: none; " src="#" id="ava_taxi" alt="">
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="">Tỉnh/Thành Phố</label><br>

                              <select class="form-control" onchange="changeProvince('province_tx','distric_tx') " name="tinh" id="province_tx">
                              @foreach($composer_province as $list)
                                <option  value="{{ $list['province_id'] }}">{{ $list['title'] }}</option>
                              @endforeach
                              </select>

                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="ava">Quận/Huyện</label>
                              <select class="form-control" onchange="changeProvince('distric_tx','ward_tx','yes') " name="huyen" id="distric_tx">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="ava">Phường/Xã</label>
                              <select class="form-control"  name="xa" id="ward_tx">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-pass">*</i>
                          <input class="form-control form-control-bg" type="text" name="lien_he_1" placeholder="{{ trans('frontend.header.info.lien_he_1') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-code"></i>
                          <input class="form-control form-control-bg" type="text" name="lien_he_2" placeholder="{{ trans('frontend.header.info.lien_he_2') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <button class="btn-sign" type="submit"><span>{{ trans('frontend.header.info.hoan_thanh') }}</span></button>
                      </div>
                    </div>
                    </form>
                  </div>

                  {{-- Xe Tải --}}
                  <div class="tab-pane fade" id="formTab-4" role="tabpanel" aria-labelledby="form-tab-4">
                    <form action="{{ route('frontend.registryCar','xe_tai') }}" method="POST" id="form_xe_tai" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="form-style">
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-email">*</i>
                          <input class="form-control form-control-bg" type="text" name="ten_xe" placeholder="{{ trans('frontend.header.info.ten_nha_xe') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt"><i class="ic-user">*</i>
                              <input class="form-control form-control-bg" type="text" name="tai_trong" placeholder="{{ trans('frontend.header.info.xe_tai.trong_tai') }}">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>{{ trans('frontend.header.info.ava') }}</label>
                            <div class="form-group-ipt"><i class="ic-user"></i>
                              <input name="ava" onchange="readURL(this,'ava_xe_tai') " type="file">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <img style="width: 100%;height:100%;;display: none; " src="#" id="ava_xe_tai" alt="">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="">Tỉnh/Thành Phố</label><br>

                              <select class="form-control" onchange="changeProvince('province_xt','distric_xt') " name="tinh" id="province_xt">
                              @foreach($composer_province as $list)
                                <option  value="{{ $list['province_id'] }}">{{ $list['title'] }}</option>
                              @endforeach
                              </select>

                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="ava">Quận/Huyện</label>
                              <select class="form-control" onchange="changeProvince('distric_xt','ward_xt','yes') " name="huyen" id="distric_xt">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group-ipt">
                              <label for="ava">Phường/Xã</label>
                              <select class="form-control"  name="xa" id="ward_xt">
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-pass">*</i>
                          <input class="form-control form-control-bg" type="text" name="lien_he_1" placeholder="{{ trans('frontend.header.info.lien_he_1') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group-ipt"><i class="ic-code"></i>
                          <input class="form-control form-control-bg" type="text" name="lien_he_2" placeholder="{{ trans('frontend.header.info.lien_he_2') }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <button class="btn-sign" type="submit"><span>{{ trans('frontend.header.info.hoan_thanh') }}</span></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>