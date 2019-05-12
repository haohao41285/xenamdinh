@extends('frontend.layouts.master')
@section('meta')
<meta name="get_data" content="{{route('frontend.transport.get-data')}}">
@stop
@section('style')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop
@section('content')
<div class="single">
	<div class="container">
		<table id="datatable" class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Tên Nhà Xe</th>
					<th>Tuyến</th>
					<th>Đánh Giá</th>
					<th>Liên Hệ</th>
					<th>Chi Tiết</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@stop
@section('script')
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('/js/page/transport.js')}}" type="text/javascript" ></script>
@stop