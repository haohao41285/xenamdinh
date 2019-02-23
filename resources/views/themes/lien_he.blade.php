@extends('frontend.layouts.master')
@section('title')
@endsection
@section('content')
 <div class="mainWrapper contactUs">
       
        <section>
          <div class="container">
            <div class="heading">
              <h1><span class="red">   Đóng góp </span><span>   với chúng tôi!</span></h1>
            </div>
          </div>
        </section>
        <section class="mainContact">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="contact-information">
                  <div class="mainLoan__inner__item">
                    <div class="body contact-us">
                      <div class="icon"><span></span></div>
                      <div class="text">
                        <p>contact information</p>
                      </div>
                    </div>
                  </div>
                  <div class="contact-information__item">
                    <div class="head"><i class="fa fa-map-marker"></i><span> address</span></div>
                    <div class="body">
                      <p class="title"> ricenow</p>
                      <p> 97 man Thiện,</p>
                      <p>  Hiệp phú </p>
                    </div>
                  </div>
                  <div class="contact-information__item">
                    <div class="head"><i class="fa fa-phone"></i><span>  phone</span></div>
                    <div class="body">
                      <p>  (+84) 111 111 111</p>
                    </div>
                  </div>
                  <div class="contact-information__item">
                    <div class="head"><i class="fa fa-envelope"></i><span>   email</span></div>
                    <div class="body">
                      <p>  ricenow@gmail.com</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="contact contactPage">
                  <div class="title">
                    <h3> Contact form</h3>
                  </div>
                  <div class="form">        
                    <form action="{{ route('frontend.contact') }}" id="form_contact" method="POST">
                      {{ csrf_field() }}
                      <div class="form-style">
                      <div class="form-group">
                        <label for="inputName">full name<span>   *</span></label>
                        <input class="form-control" name="name" id="inputName" type="text" placeholder="Enter name">
                      </div>
                        <div class="form-group">
                          <label for="inputPhone">Phone<span>   *</span></label>
                          <input class="form-control" name="phone" id="inputPhone" type="text" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                          <label for="inputMail">Email<span>   *</span></label>
                          <input class="form-control" name="email" id="inputMail" type="email" placeholder="Enter email">
                        </div>
                      <div class="form-group">
                        <label for="message">Message<span>   *</span></label>
                        <textarea class="form-control" name="message" id="message" rows="3" placeholder="Your message"></textarea>
                      </div>
                    </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <div class="imageRobot"><img src="{{ asset('/html/assets/images/home/robot.png') }}" alt=""></div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="sendForm btnContact" onclick="submitForm('form_contact') "><a class="btnPrimary">  Send</a></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        {{-- <section class="maps">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div id="mapLocation" style="height: 350px;"></div>
              </div>
            </div>
          </div>
        </section> --}}
      </div>
      {{-- v  --}}
@endsection