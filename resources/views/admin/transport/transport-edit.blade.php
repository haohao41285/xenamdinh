@extends('admin.layouts.master')
@section('meta')
<meta name="linkDatatable" content="{{route('admin.address')}}">
@endsection
@section('style')
<link href="{{asset('html/assets/css/checkdate.css')}}" rel="stylesheet" type="text/css" media="all" />
<style type="text/css" media="screen">
	.select-size label,.select-s label{
		color: black;
	}
</style>
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transport Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transport</a></li>
        <li class="active">Edit/Add</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title ">Transport Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.transport.postEdit')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <input type="hidden" name="transport_id"  value="{{$transport_list!= ""?$transport_list->id:0}}">
              	
                <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Tên Xe</label>
                	<div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" name="transport_name" id="transport_name" value="{{$transport_list!=""?$transport_list->transport_name:old('transport_name')}}">
                    </div>
                </div>
                <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Tuyến</label>
                	<div class="col-sm-10">
		                <select class="form-control select2-selection select2-selection--single"  name="transport_route_id" id="transport_route_id" data-placeholder="Select a Route"
		                        style="width: 100%;">

                      @foreach($routing_list as $routing)
		                  <option time_format="{{$routing->route_time_format}}"  {{($transport_list!="") && ($transport_list->transport_route_id==$routing->id)?"selected":""}} value="{{$routing->id}}">{{$routing->route_name}}</option>
                      @endforeach
		                </select>
		            </div>
                </div>

                <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Tỉnh</label>
                	<div class="col-sm-10">
            			<select class="form-control select2-selection select2-selection--single" name="transport_province" data-placeholder="Tỉnh"
	                        style="width: 100%;"  onchange="changeProvince('province','district') " id="province">
                    @foreach($composer_province as $province)
		                  <option value="{{$province['province_id']}}">{{$province['title']}}</option>
                    @endforeach
		                </select>
		            </div>
		        </div>
		        <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Huyện</label>
                	<div class="col-sm-10">
            			<select  class="form-control select2-selection select2-selection--single"  name="transport_district" data-placeholder="Huyện"
	                        style="width: 100%;" id="district"  onchange="changeProvince('district','ward','yes') ">
		                </select>
	                </div>
	            </div>
	            <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Xã</label>
                	<div class="col-sm-10">
            			<select  class="form-control select2-selection select2-selection--single" name="transport_ward" data-placeholder="Xã"
	                        style="width: 100%;" id="ward">
		                </select>
	                </div>
	            </div>
	            <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Chi Tiết</label>
                	<div class="col-sm-10">
	                	<input type="text" name="transport_detail" class="form-control form-control-sm" id="" placeholder="Gần cầu Ông Kiểm...">
	                	</div>
	                </div>
                </div>
                <div class="form-group">
	                <label class="col-sm-2 control-label">Loại Xe</label>
	                <div class="col-sm-10">
	                	<select class="form-control select2-selection select2-selection--single" name="transport_cate_id" data-placeholder="Loại Xe"
	                        style="width: 100%;">
                        @foreach($cate_transport_list as $cate_transport)
		                      <option {{ ($transport_list&&$transport_list->transport_cate_id==$cate_transport->id)?"selected":""}} value="{{$cate_transport->id}}">{{$cate_transport->cate_transport_name}}</option>
                        @endforeach
	                </select>
	                </div>
                </div>
                <div class="form-group">
	                <label class="col-sm-2 control-label">Số Ghế</label>
	                <div class="col-sm-10">
                    @php 
                    $so_ghe_arr = ['4','7','9','12','16','45'];
                    @endphp
	                	<select class="form-control select2-selection select2-selection--single" name="transport_character"data-placeholder="Số Ghế"
	                        style="width: 100%;">
                      @foreach($so_ghe_arr as $so_ghe)
		                    <option {{($transport_list&&$transport_list->transport_character==$so_ghe)?"selected":""}} value="{{$so_ghe}}">{{$so_ghe}}</option>
                      @endforeach
	                </select>
	                </div>
                </div>
                <div class="form-group date" hidden>
                    <label class="col-sm-2 control-label">Ngày Đi</label>
                    <div class="select-size col-sm-10">
                      @for ($i = 1; $i < 32; $i++)
                        <input type="checkbox"  name="transport_time_go[]" value="{{ $i }}" id="d{{ $i }}"/>
                      @endfor

                      @for ($i = 1; $i < 32; $i++)
                        <label onclick="checkDate('select-size')" for="d{{ $i }}">{{ $i }}</label>
                      @endfor
                    </div>
                </div>
                <div class="form-group date" hidden>
                    <label class="col-sm-2 control-label">Ngày Về</label>
                    <div class="select-s col-sm-10">
                      @for ($i = 1; $i < 32; $i++)
                        <input type="checkbox"  value="{{ $i }}" name="transport_time_back[]" id="n{{ $i }}"/>
                      @endfor
                      <input type="checkbox" id="all_day_start" name="">

                      @for ($i = 1; $i < 32; $i++)
                        <label onclick="checkDate('select-s')" for="n{{ $i }}">{{ $i }}</label>
                      @endfor
                      <label for="all_day_start">All</label>
                    </div>
                </div>
                <div class="bootstrap-timepicker time" hidden>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">Xuất Bến:</label>
		                <div class=" col-sm-10">
		                    <input type="text" name="transport_time_go[]" class="form-control timepicker">
		                </div>
	                </div>
	            </div>
	            <div class="bootstrap-timepicker time" hidden>
	                <div class="form-group">
		                <label class="col-sm-2 control-label">Trở Về:</label>
		                <div class=" col-sm-10">
		                    <input type="text" name="transport_time_back[]" class="form-control timepicker">
		                </div>
	                </div>
	            </div>
	            <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Lộ Trình</label>
                	<div class="col-sm-10">
                        <input type="text" name="transport_way" class="form-control form-control-sm" id="" placeholder="Lộ trình" value="{{$transport_list?$transport_list->transport_way:old('transport_way')}}">
                    </div>
                </div>
                <div class="form-group">
                  <label for="transport_phone" class="col-sm-2 control-label">Liên Hệ</label>
                  <div class="col-sm-10">
                        <input type="text" name="transport_phone" class="form-control form-control-sm" id="transport_phone" data-inputmask='"mask": "(999) 999-9999"' data-mask  value="{{$transport_list?$transport_list->transport_phone:old('transport_phone')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="transport_phone_add" class="col-sm-2 control-label">Liên Hệ(nếu có)</label>
                  <div class="col-sm-10">
                        <input type="text" name="transport_phone_add" class="form-control form-control-sm" id="transport_phone_add" data-inputmask='"mask": "(999) 999-9999"' data-mask  value="{{$transport_list?$transport_list->transport_phone_add:old('transport_phone_add')}}">
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-md-2 control-label">Ảnh đại diện</label>
                      <div class="col-md-10">
                        <input type="hidden" value="{{$transport_list?$transport_list->transport_image:""}}" name="transport_image_old">
                        <input id="ava" name="transport_image" onchange="readURL(this,'avatar')"  type="file">
                      </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2"> </div>
                  <div class="col-md-10">
                    <img style="max-height:100px;" src="{{$transport_list?asset($transport_list->transport_image):""}}" id="avatar" alt="">
                  </div>
                </div>
                <div class="form-group">
                	<label class="col-sm-2 control-label">Dịch Vụ</label>
                	<div class="col-sm-10">
		                <label>
		                  <input type="checkbox" name="transport_note[]"  value="Nhà vệ sinh trên xe" class="flat-red" checked>
		                  Nhà vệ sinh trên xe
		                </label><br>
		                <label>
		                  <input type="checkbox" name="transport_note[]" value="Wifi miễn phí" class="flat-red" checked>
		                  Wifi miễn phí
		                </label><br>
		                <label>
		                  <input type="checkbox" name="transport_note[]" value="Khăn lạnh" class="flat-red" checked>
		                  Khăn lạnh
		                </label><br>
		                <label>
		                  <input type="checkbox" value="Nước lọc" name="transport_note[]" class="flat-red" checked>
		                  Nước lọc
		                </label>
		            </div>
              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-danger  pull-right">Cancel</button>&nbsp
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
</div>
@stop
@section('script')
<script src="{{asset('assets/ajax/address.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $('#transport_route_id').change(function(event) {
      var time_format = $('#transport_route_id option:selected').attr('time_format');
      if(time_format == 1){
        $('.date').slideDown();
        $('.time').slideUp();
      }else{
        $('.time').slideDown();
        $('.date').slideUp();
      }
    });
  });
</script>
@stop