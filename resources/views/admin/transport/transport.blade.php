@extends('admin.layouts.master')
@section('meta')
<meta name="get_data" content="{{route('admin.transport.datatable')}}">
<meta name="linkDelete" content="{{route('admin.transport.delete')}}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transport List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transport</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
	<section class="content">
	      <div class="row">
	        <div class="col-xs-12">
	          <div class="box">
	          	<br>
	          	<div class="col-md-12">
	          		<div class="col-md-2">
	          			<select name="transport_cate_id" class="form-control form-control-sm" id="transport_cate_id">
	          				<option value="">Loại Xe</option>
	          			@foreach($cate_transport_list as $cate)
	          				<option value="{{$cate->id}}">{{$cate->cate_transport_name}}</option>
	          			@endforeach
	          			</select>
	          		</div>
	          		<div class="col-md-2">
	          			<select name="transport_route_id" class="form-control form-control-sm" id="transport_route_id">
	          				<option value="">Tuyến</option>
	          			@foreach($routing_list as $routing)
	          				<option value="{{$routing->id}}">{{$routing->route_name}}</option>
	          			@endforeach
	          			</select>
	          		</div>
	          		<div class="col-md-2">
	          			<select name="transport_active" class="form-control form-control-sm" id="transport_active">
	          				<option value="">Active or Not</option>
	          				<option value="1">Yes</option>
	          				<option value="0">No</option>
	          			</select>
	          		</div>
	          		<div class="col-md-2">
	          		    <button type="button" class="search btn btn-sm btn-primary">Search</button>
	          		</div>
	          	</div>
	          	<br>
	          	
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datatable" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Name</th>
	                  <th>Image</th>
	                  <th>Routing</th>
	                  <th>Update By</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	              </table>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->
    </section>
</div>
@stop
@section('script')
<script src="{{asset('admin/js/page/transport.js')}}" type="text/javascript"></script>
@stop