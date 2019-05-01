@extends('admin.layouts.master')
@section('meta')
<meta name="get_route" content="{{route('admin.routing-transport.delete')}}">
<meta name="get_data" content="{{route('admin.routing-transport.getData')}}">
@section('style')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Routing Transport List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Routing Transport</a></li>
        <li class="active">List</li>
      </ol>
    </section>
	<section class="content">
	      <div class="row">
	        <div class="col-xs-12">
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Routing Transport List</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datatable" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Route Name</th>
	                  <th>Route Image</th>
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
<script src="{{asset('admin/js/page/routing_transport.js')}}" type="text/javascript" ></script>
@stop