@extends('frontend.layouts.master')
@section('content')
<section class="mainDetail list">
        <div class="container list__wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-9">
            	    <div class="col-lg-12">
            	    <div class="mainDetail__overview">
            	    	@foreach($infors['works'] as $infor['works'])
            	    	<div class="list__item">
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                      <div class="list__item__image"><a style="background-image:url('{{ asset($infor['works']['ava']) }}')"><img src="{{ asset($infor['works']['ava']) }}" alt=""></a></div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                      <div class="list__item__info"><a href="/pages/buy-detail.html">{{ $infor['works']['cong_ty'] }}</a>
                        <p class="address"><i class="icon_pin"></i><span>{{ $infor['works']['dia_chi'] }}</span></p>
                        <p>{{ $infor['works']['mo_ta'] }}</p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2">

                      @if($composer_customer->id == $infor['works']->customer_id)
                      <a href="{{ route('frontend.work.update',$infor['works']['id']) }}">
                      <span class="icon_pencil-edit" title="Sửa"></span>
                    </a>
                    <a href="{{ route('frontend.work.delete',$infor['works']['id']) }}">
                          <span onclick="return confirm('Xóa tin này?') " class=" icon_trash_alt" title="Xóa"></span>
                    </a>
                      @endif

                      <div class="list__item__price">
                        <p class="sale"> <span>{{ timeToString($infor['works']->created_at) }}</span></p>
                        <p class="author">   <span>   by</span><span>{{ App\Models\TuyenDung::find($infor['works']->id)->customer->customer_info->getPresenter()->fullName() }}</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            	    </div>
            	</div>
            	    <div class="col-lg-12">
            	    	<div class="mainDetail__overview">
            		    đây là ô hiển thị news
            	        </div>
            	    </div>            	
                </div>
                    <div class="col-lg-3"> 
                    	<div class="mainDetail__overview">
                	        <h4 class="heading">Thông Tin Cá Nhân</h4>
                	        <div>Email: {{ $infors['customer']->email }}</div>
                	        <div>Họ Tên: {{ $infors['customer_infor']->last_name.$infors['customer_infor']->first_name }}</div>
                    	    <div>Giới Tính: {{ ($infors['customer_infor']->gender == 1)?"Nam":"Nữ"  }}</div>
                        </div>
                    </div>
            </div>
        </div>
</section>
@endsection