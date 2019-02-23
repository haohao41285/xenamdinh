@extends('frontend.layouts.master')
@section('title')
@endsection
@section('content')
<main class="wrapper">
      <section class="breadcrumbWrapper">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"> <span></span>  Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">  News</li>
          </ol>
        </div>
      </section>
      <section class="newsMain">
        <div class="container">
          <div class="search"> 
            <div class="newsSearch">
              <div class="heading">
                <h1><span>   Văn hóa </span><span class="red">  xe </span></h1>
              </div>
            </div>
          </div>
          <div class="gridNews">
            <div class="row">
              
              @foreach($news as $new)
              <div class="col-md-4 col-6 break480">
                <div class="gridNews__item">
                  <div class="image"><a style="background-image:url('{{ asset($new->ava) }}')" title="{{ $new->title }}" href="{{ route('frontend.detail.news',removeFirstString($new->detail_path)) }}"><img src="{{ asset($new->ava) }}" alt=""></a></div>
                  <div class="gridNews__info">
                    <div class="rate"><a style="text-transform: capitalize;" title="{{ $new->title }}" href="{{ route('frontend.detail.news',removeFirstString($new->detail_path)) }}"><span>{{ summaryTitle(($new->title),100) }}</span></a></div>
                  </div>
                </div>
              </div>
            @endforeach
            
            </div>
          </div>
          {{-- Phân trang --}}
          <div class="pager">
            {{ $news->links('vendor.pagination.bootstrap-4') }}
          </div>

        </div>
      </section>
    </main>
@endsection