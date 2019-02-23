@extends('frontend.layouts.master')
@section('title')

@endsection
@section('content')
<section class="mainDetail">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <h4 class="heading ">Thay Đổi Thông Tin</h4>
               <form action="{{ route('frontend.work',$id) }}" method="POST" enctype="multipart/form-data" id="work_form">
                {{ csrf_field() }}
                 <div class="mainDetail__overview">
                   <h5>Tên Công Ty</h5>
                   <input class="form-control" type="text" name="cong_ty" value="{{ $post->cong_ty }}">
                 </div>
                 <div class="mainDetail__overview">
                   <h5>Địa Chỉ</h5>
                   <input class="form-control" type="text" name="dia_chi" value="{{ $post->dia_chi }}">
                 </div>
                 <div class="mainDetail__overview">
                   <h5>Mô Tả Công Việc</h5>
                   <input class="form-control" type="text" name="mo_ta" value="{{ $post->mo_ta}}">
                 </div>
                 <div class="mainDetail__overview">
                   <h5>Ảnh Đại Diện</h5>
                   <img style="width: 50%;margin: auto" id="ava_ct" src="{{ asset($post->ava) }}" alt="">
                   <br>
                   <label for="ava">Thay Ảnh Đại Diện</label><br>
                   <input  id="ava" onchange="readURL(this,'ava_ct')" type="file" name="ava" value="{{ $post->ava }}">
                 </div>
                 <div class="mainDetail__overview">
                   <input class="btn btn-primary" type="submit"  value="Xong">
                 </div>
               </form>
              
          </div>
        </div>
      </section>
@endsection
