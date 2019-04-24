@extends('admin.layouts.master')
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
        General Form Elements
        <small>Preview</small>
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
            <div class="box-header with-border">
              <h3 class="box-title text-center">Transport Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal">
              <div class="box-body">
              	
                <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Tên Xe</label>
                	<div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Tuyến</label>
                	<div class="col-sm-10">
		                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
		                        style="width: 100%;">
		                  <option>Hà Nội</option>
		                  <option>Sài Gòn</option>
		                  <option>Tây Nguyên</option>
		                  <option>Vinh-Đà Nẵng</option>
		                </select>
		            </div>
                </div>

                <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Tỉnh</label>
                	<div class="col-sm-10">
            			<select class="form-control select2" multiple="multiple" data-placeholder="Tỉnh"
	                        style="width: 100%;">
		                  <option>4</option>
		                  <option>7</option>
		                  <option>16</option>
		                </select>
		            </div>
		        </div>
		        <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Huyện</label>
                	<div class="col-sm-10">
            			<select class="form-control select2" multiple="multiple" data-placeholder="Huyện"
	                        style="width: 100%;">
		                  <option>4</option>
		                  <option>7</option>
		                  <option>16</option>
		                </select>
	                </div>
	            </div>
	            <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Xã</label>
                	<div class="col-sm-10">
            			<select class="form-control select2" multiple="multiple" data-placeholder="Xã"
	                        style="width: 100%;">
		                  <option>4</option>
		                  <option>7</option>
		                  <option>16</option>
		                </select>
	                </div>
	            </div>
	            <div class="form-group">
                	<label for=""  class="col-sm-2 control-label">Chi Tiết</label>
                	<div class="col-sm-10">
	                	<input type="text" class="form-control form-control-sm" id="" placeholder="Gần cầu Ông Kiểm...">
	                	</div>
	                </div>
                </div>
                <div class="form-group">
	                <label class="col-sm-2 control-label">Số Ghế</label>
	                <div class="col-sm-10">
	                	<select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
	                        style="width: 100%;">
		                  <option>4</option>
		                  <option>7</option>
		                  <option>16</option>
	                </select>
	                </div>
	                
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày Đi</label>
                    <div class="select-size col-sm-10">
                      @for ($i = 1; $i < 32; $i++)
                        <input type="checkbox" {{ $i==16?"checked":" " }} name="thoi_gian[thoi_gian_di][]" value="{{ $i }}" id="d{{ $i }}"/>
                      @endfor

                      @for ($i = 1; $i < 32; $i++)
                        <label onclick="checkDate('select-size')" for="d{{ $i }}">{{ $i }}</label>
                      @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày Về</label>
                    <div class="select-s col-sm-10">
                      @for ($i = 1; $i < 32; $i++)
                        <input type="checkbox" {{ $i==18?"checked":" " }} value="{{ $i }}" name="thoi_gian[thoi_gian_ve][]" id="n{{ $i }}"/>
                      @endfor
                      <input type="checkbox" id="all_day_start" name="">

                      @for ($i = 1; $i < 32; $i++)
                        <label onclick="checkDate('select-s')" for="n{{ $i }}">{{ $i }}</label>
                      @endfor
                      <label for="all_day_start">All</label>
                    </div>
                </div>
                <div class="bootstrap-timepicker">
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">Xuất Bến:</label>
		                <div class="input-group col-sm-10">
		                    <input type="text" class="form-control timepicker">
		                </div>
	                </div>
	            </div>
	            <div class="bootstrap-timepicker">
	                <div class="form-group">
		                <label class="col-sm-2 control-label">Tới Bến:</label>
		                <div class="input-group col-sm-10">
		                    <input type="text" class="form-control timepicker">
		                </div>
	                </div>
	            </div>
	            <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Lộ Trình</label>
                	<div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Ảnh Đại Diện</label>
                  <div class="col-sm-10">
                  	<input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Dịch Vụ</label>
                  	<div class="col-sm-10">
                  		<input type="checkbox"> Nhà vệ sinh trên xe<br>
                  		<input type="checkbox"> Wifi miễn phí<br>
                  		<input type="checkbox"> Khăn lạnh<br>
                  		<input type="checkbox"> Nước uống<br>
                  	</div>
                    
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
</div>
@endsection