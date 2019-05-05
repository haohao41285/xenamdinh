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
            <form action="{{route('admin.news_cate.postEdit')}}" method="POST" id="information_form" class="form-horizontal" enctype="multipart/form-data">
            	@csrf
              <input type="hidden" name="id" value="{{$news_cate != ""?$news_cate->id:0}}">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Routing Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="cate_news_name" value="{{$news_cate != ""?$news_cate->cate_news_name:old('cate_news_name')}}" >
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