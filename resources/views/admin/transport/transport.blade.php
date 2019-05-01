@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
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
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datatable" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Name</th>
	                  <th>Image</th>
	                  <th>Character</th>
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
@stop