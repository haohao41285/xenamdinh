@extends('frontend.layouts.master')
@section('title')
@endsection
@section('meta')
    <meta name="linkPost" content={{ route('frontend.post.news') }} />
@endsection
@section('content')
<section class="search">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 col-md-12">
              <form id="searchForm" method="POST" action="{{ route('frontend.xe.search','xe_khach') }}">
                <div class="form">
                  {{ csrf_field() }}

                  <div class="form-group" id="residental">
                    <select name="tuyen_id" class="form-control " >

                      <option value="">TUYẾN</option>
                      @foreach($tuyen_ids as $tuyen_id)
                            <option value="{{ $tuyen_id->tuyen_id }}">{{$tuyen_id->tuyens->ten_tuyen }}</option>
                        @endforeach

                    </select>
                  </div>
                  <div class="form-group" id="residental">
                    <select name="thoi_gian_di" class="form-control " >

                      <option value="">THỜI GIAN ĐI</option>
                      @for($i=1;$i<32;$i++)
                            <option value="{{ $i }}">Mùng {{$i}}</option>
                        @endfor

                    </select>
                  </div>
                  <div class="form-group" id="residental">
                    <select name="thoi_gian_ve" class="form-control " >

                      <option value="">THỜI GIAN VỀ</option>
                      @for($i=1;$i<32;$i++)
                            <option value="{{ $i }}">Mùng {{$i}}</option>
                        @endfor

                    </select>
                  </div>
                  <div class="form-group" id="residental" >
                    <select class="form-control" onchange="changeProvince('province_search','distric_search') " name="tinh" id="province_search">

                              @foreach($composer_province as $list)
                                <option  value="{{ $list['province_id'] }}">{{ $list['title'] }}</option>
                              @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" onchange="changeProvince('distric_search','ward_search','yes')" name="huyen" id="distric_search">
                    </select>
                  </div>
                  <div class="form-group"  >
                    <select class="form-control" name="xa"  id="ward_search">
                      <option value=""></option>
                    </select>
                   </div>
                  
                  <div class="form-group"><a class="btnPrimary btnSearch" onclick="submitForm('searchForm')">  search</a></div>
                </div>
              </form>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="newsLaunch"><a class="btnPrimary btnNewsLaunch" href="{{ url('/xe_khach') }}">Đặt Xe Khách</a></div>
            </div>
          </div>
        </div>
</section>
<div class="container">
  <div class="row">
    <div class="col-lg-9 row">
      <div>
          <div class="mainDetail__overview post_news">
            <form id="form_post_news">
               {{ csrf_field() }}
               <textarea class="form-control" id="content" rows="2" placeholder="What's New ?"></textarea>
              <input type="hidden" id="customer_name" value="{{ ($composer_customer)?$composer_customer->customer_info->getPresenter()->fullName():"" }}">
              <input type="hidden" id="customer_id" value="{{ ($composer_customer)?$composer_customer->id:"" }}">
              <input type="hidden" id="parent_id" value="0">
              <input type="hidden" value="{{ \Carbon\Carbon::now() }}" id="date">
              <img src="#" id="img" style="max-height: 50px;display: none">
              <input type="file" id="file" onchange="readURL(this,'img')" name="img" value="" hidden>
               <span title="Thêm Ảnh" onclick="openFile('file')" class="icon_image"></span>
              <span class="btn-post"
              @if($composer_customer)
                onclick="postNews('content','file','img','new_post','parent_id')" 
              @else
                onclick="displayModal('loginModal')"
              @endif 
              >Đăng</span>
          </form>
           
          </div>
          <div class="mainDetail__overview">
  <div class="row">
  <!-- Contenedor Principal -->
    <div class="comments-container">

    <ul id="comments-list" class="comments-list">
      <li id="new_post"></li>
      @foreach($news as $new)
      <li>
        <div class="comment-main-level row">
          <!-- Avatar -->
          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
          <!-- Contenedor del Comentario -->
          <div class="comment-box">
            <div class="comment-head row">
              <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{ $new->customer->customer_info->getPresenter()->fullName() }}</a></h6>
              <span>{{ formatTimeDate($new->date) }}</span>
              <a href="#content_reply{{ $new->id }}"><i class="fa fa-reply"></i></a>
            </div>
            @if($composer_customer && $composer_customer->id == $new->customer->id)
            <a href="{{ route('frontend.news.delete',$new->id) }}" onclick="return confirm('Bạn muốn xóa tin này?')" title="Xóa tin"><span class="social_flickr" style="float: right;"></span></a>
            @endif
            <div class="comment-content">
              {{ $new->content }}
              @if($new->file != 'undefined')
              <img src="{{ $new->file }}" style="width:100%" alt="">
              @endif
            </div>
          </div>
        </div>
        <ul class="comments-list reply-list row">
         
          @php
            $new_sons = App\Models\CustomerNews::whereParentId($new->id)->get();
          @endphp
          @if(!empty($new_sons))
          @foreach($new_sons as $new_son)
          <li>
             <div class="comment-main-level row">
          <!-- Avatar -->
             <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
          <!-- Contenedor del Comentario -->
               <div class="comment-box">
                <div class="comment-head row">
                  <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{$new_son->customer->customer_info->getPresenter()->fullName()}}</a></h6>
                 <span class="time_post">{{ formatTimeDate($new_son->date) }}</span>
                  <a href="#content_reply{{ $new->id }}"><i class="fa fa-reply"></i></a>
               </div>
               @if($composer_customer && $composer_customer->id == $new->customer->id)
                 <a href="{{ route('frontend.news.delete',$new->id) }}" onclick="return confirm('Bạn muốn xóa bình luận này?')" title="Xóa tin?"><span class="social_flickr" style="float: right;"></span></a>
               @endif
                <div class="comment-content">
              {{ $new_son->content }}
              @if( ($new_son->file) && $new_son->file != "undefined")
              <img src="{{ $new_son->file }}" style="width:100%" alt="">
              @endif
             </div>
            </div>
             </div>
           </li>
          @endforeach
          @endif
          <li id="li{{ $new->id }}"></li>
          <div class="row input-group form-group">
            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>

            <img src="#" id="img_reply{{ $new->id }}" style="max-height: 50px;display: none">

            <textarea class="form-control input-sm" id="content_reply{{ $new->id }}"
              @if($composer_customer)
              onkeypress="return reply(event,'content_reply{{ $new->id }}','file_reply{{ $new->id }}','img_reply{{ $new->id }}','li{{ $new->id }}','parent_id{{ $new->id }}')"
              @else
              onclick="displayModal('loginModal')"
              @endif 
               placeholder="Viết bình luận" rows="1"></textarea>

              <input type="hidden" id="parent_id{{ $new->id }}" value="{{ $new->id }}">
              <input type="file" id="file_reply{{ $new->id }}" onchange="readURL(this,'img_reply{{ $new->id }}')"  hidden>
               <span title="Thêm Ảnh" onclick="openFile('file_reply{{ $new->id }}')" class="icon_image" style="position: absolute;right: 15px;top:11px;z-index: 222"></span>

          </div>
          
        </ul>
      </li>
      @endforeach
       
    </ul>
  </div>
  </div>

        </div>
      </div>
    </div>
    <div class="col-lg-3">
    news
    </div>
  </div>
</div>

@endsection
@section('script')
  <script src="{{ asset('assets/ajax/customer_news.js') }}"></script>
@endsection