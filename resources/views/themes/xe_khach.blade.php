@extends('frontend.layouts.master')
@section('title')
@endsection
@section('report')
@include('frontend.layouts.partials.report')
@endsection
@section('content')
@include('frontend.layouts.partials.message_book')
<section class="search">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 col-md-12">
              <form id="searchForm" method="POST" action="{{ route('frontend.xe.search',$theme) }}">
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
              <div class="newsLaunch"><a class="btnPrimary btnNewsLaunch" href="javascript:void(0)">Tìm Kiếm Phù Hợp</a></div>
            </div>
          </div>
        </div>
</section>

      <h6 class="heading">{{ $xes->total() }} Xe được tìm thấy!</h5>

<section class="table-content">
	<table class="table table-striped table-hover table-bordered {{-- table-responsive  --}} " style="width: 100%;">
		<caption></caption>
		<thead class="thead-dark">
			<tr>
				<th class="align-middle">STT</th>
				<th class="align-middle">Avatar</th>
				<th class="align-middle">Nhà Xe</th>
				<th class="align-middle">Số Ghế</th>
				<th class="align-middle">Tuyến</th>
				<th class="align-middle">Thời gian đi</th>
				<th class="align-middle">Thời Gian Về</th>
				<th class="align-middle">Địa Chỉ</th>
				<th class="align-middle">Giá Vé</th>
				<th class="align-middle">Liên Hệ</th>
				<th class="align-middle">Báo Cáo</th>
			</tr>
		</thead>
		<tbody>

			@foreach($xes as $xe)
			<tr>
			    <td width="40" class="align-middle">{{ $stt++ }}</td>
			    <td width="50" class="align-middle"><img class="img-responsive" src="{{ asset($xe->ava) }}" alt=""></td>
				<td class="align-middle">{!! $xe->ten_xe !!}</td>
				<td class="align-middle">{!! $xe->so_cho !!}</td>
				<td class="align-middle">{!! $xe->tuyens->ten_tuyen!!}</td>
				<td class="align-middle">
					@foreach($xe->thoigians as $thoigian)
					@if($thoigian->thoi_gian_di != null)
					{{ $thoigian->thoi_gian_di }}-
					@endif
					@endforeach
				</td>
				<td class="align-middle">
					@foreach($xe->thoigians as $thoigian)
					@if($thoigian->thoi_gian_ve != null)
					{{ $thoigian->thoi_gian_ve }}-
					@endif
					@endforeach
				</td>
				<td>
					@foreach($composer_ward[$xe->huyen] as $ward)
					@if($ward['id']==$xe->xa)
					{{ $ward['title'] }}
					@endif
					@endforeach
					-
					@foreach($composer_district[$xe->tinh] as $district)
					@if($district['id']==$xe->huyen)
					{{ $district['title'] }}
					@endif
					@endforeach
					-
					@foreach($composer_province as $province)
					@if($province['province_id']==$xe->tinh)
					{{ $province['title'] }}
					@endif
					@endforeach

				</td>
				<td>{{ str_replace(",",".",number_format($xe->price))}} &#8363</td>
				<td class="align-middle">
					{!! 'Phone: '.$xe->lien_he_1 !!}
					<br>
					{!! $xe->lien_he_2 ?'Phone:'.$xe->lien_he_2 :'' !!}
				</td class="align-middle">
				<td class="align-middle">
					<button class="btn btn-sm btn-primary" onclick="showBaoCao('{{$xe->id}}','{{$xe->ten_xe.' ('.$xe->tuyens->ten_tuyen.')'}}','{{$xe->price}}')">Đặt vé</button>

				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	<div class="pager">
		{{ $xes->links('vendor.pagination.bootstrap-4') }}
	</div>
</section>
@endsection
@section('script')
<script src="{{ asset('assets/js/function.js') }}"></script>
@endsection
