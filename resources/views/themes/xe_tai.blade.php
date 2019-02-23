@extends('frontend.layouts.master')
@section('title')
@endsection
@section('report')
@include('frontend.layouts.partials.report')
@endsection
@section('content')
<section class="search">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 col-md-12">
              <form id="searchForm" method="POST" action="{{ route('frontend.xe.search',$theme) }}">
                <div class="form">
                  {{ csrf_field() }}

                  <div class="form-group" id="residental">
                    <select name="tai_trong" class="form-control " >

                    	<option value="">Tải Trọng</option>
                    	@foreach($tai_trongs as $tai_trong)
                            <option value="{{ $tai_trong->tai_trong }}">{{ $tai_trong->tai_trong }}Tấn</option>
                        @endforeach

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

      <h6 class="heading">{{ $xes->total() }} Xe được tìm thấy!</h6>

<section class="table-content">
	<table class="table table-striped table-hover table-bordered {{-- table-responsive  --}} " style="width: 100%;">
		<caption></caption>
		<thead class="thead-dark">
			<tr>
				<th class="align-middle">STT</th>
				<th class="align-middle">Avatar</th>
				<th class="align-middle">Nhà Xe</th>
				<th class="align-middle">Tải Trọng <br>(tấn)</th>
				<th class="align-middle">Địa Chỉ</th>
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
				<td class="align-middle">{!! $xe->tai_trong!!}</td>
				<td class="align-middle">
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
				<td class="align-middle">
					{!! 'Phone: '.$xe->lien_he_1 !!}
					<br>
					{!! $xe->lien_he_2 ?'Phone:'.$xe->lien_he_2 :'' !!}
				</td class="align-middle">
				<td class="align-middle">
					<button class="btn btn-sm btn-primary" onclick="showBaoCao('{{$xe->ten_xe}}','Xe Tải')">Báo Cáo</button>

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