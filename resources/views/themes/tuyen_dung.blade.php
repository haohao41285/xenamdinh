@extends('frontend.layouts.master')
@section('title')
@endsection
@section('content')

<section class="list">
        <div class="container">
          <div class="list__wrapper">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                 <div class="heading">
                <h1><span>   Việc Làm </span></h1>
              </div>
                
            @foreach($tuyen_dungs as $tuyen_dung)
                <div class="list__item">
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                      <div class="list__item__image"><a style="background-image:url('{{ asset('html/images/company.jpg') }}')" href="{{ asset(' html/pages/buy-detail.html') }}"><img src="{{ asset('html/images/company.jpg') }}" alt=""></a></div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                      <div class="list__item__info"><a href="/pages/buy-detail.html">{{ $tuyen_dung->cong_ty }}</a>
                        <p class="address"><i class="icon_pin"></i><span>{{ $tuyen_dung->dia_chi }}</span></p>
                        <p>{{ $tuyen_dung->mo_ta }}</p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2">

                      @if($composer_customer && $composer_customer->id == $tuyen_dung->customer_id)
                      <a href="{{ route('frontend.work.update',$tuyen_dung->id) }}">
                      <span class="icon_pencil-edit" title="Sửa"></span>
                    </a>
                    <a href="{{ route('frontend.work.delete',$tuyen_dung->id) }}">
                          <span onclick="return confirm('Xóa tin này?') " class=" icon_trash_alt" title="Xóa"></span>
                    </a>
                      @endif

                      <div class="list__item__price">
                        <p class="sale"> <span>{{ timeToString($tuyen_dung->created_at) }}</span></p>
                        <p class="author">   <span>   by</span><span>{{ App\Models\TuyenDung::find($tuyen_dung->id)->customer->customer_info->getPresenter()->fullName() }}</span></p>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
                <div class="pager">
                  {{ $tuyen_dungs->links('vendor.pagination.bootstrap-4') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection