@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Routing Transport
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Routing Transport</a></li>
        <li class="active">Edit/Add</li>
      </ol>
    </section>

    <!-- Main content -->
   
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Routing Transport</h3>
            </div>
            <form action="{{route('admin.routing-transport.postEdit')}}" method="POST" id="information_form" class="form-horizontal" enctype="multipart/form-data">
            	@csrf
              <input type="hidden" name="id" value="{{$routing_transport != ""?$routing_transport->id:0}}">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Routing Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="route_name" value="{{$routing_transport != ""?$routing_transport->route_name:old('route_name')}}" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Routing Time Format</label>
                  <div class="col-sm-10">
                    <select class="form-control select2-selection select2-selection--single"  name="transport_time_format" data-placeholder="Select a Route"
                            style="width: 100%;">
                      <option {{$routing_transport->route_time_format==0?"selected":""}} value="0">Time</option>
                      <option {{$routing_transport->route_time_format==1?"selected":""}} value="1">Date</option>
                      
                    </select>
                  </div>
              </div>
            <div class="form-group">
              <input type="hidden" name="route_image_hidden" value="{{isset($routing_transport)?$routing_transport->route_image:""}}" name="">
                <label for="exampleInputFile" class="col-sm-2 control-label">Routing Avatar</label>
                <div class="col-sm-10">
              	<input type="file" id="exampleInputFile" name="route_image">
            </div>
              
            </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger btn-sm  pull-right" id="cancel_box_outside">Cancel</button>&nbsp
                <input type="submit" value="Save" class="btn btn-sm btn-primary pull-right">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@section('script')

@stop
@stop