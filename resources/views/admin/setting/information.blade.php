@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Information Setting
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Information Setting</h3>
            </div>
            <form action="" id="information_form" class="form-horizontal" method="get" accept-charset="utf-8">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Phone setting</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3"  data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address setting</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email Setting</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email Setting</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">SocialNetwork Setting</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="form-group">
                    <label  class="col-sm-2 control-label">Desciption</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
@stop