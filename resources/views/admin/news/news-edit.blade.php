@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit News Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">News</a></li>
        <li class="active">Edit/Add News</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border text-center">
              <h3 class="box-title" id="get_outside_title">Get Outside</h3>
            </div>
            <form action="" id="get_outside_box" hidden class="form-horizontal" method="get" accept-charset="utf-8">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nguồn</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thẻ Cha</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thẻ Con</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" >
                  </div>
              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger btn-sm  pull-right" id="cancel_box_outside">Cancel</button>&nbsp
                <input type="submit" value="Lấy Dữ Liệu" class="btn btn-sm btn-primary pull-right">
              </div>
            </form>
          </div>
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Information News</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
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
                <label class="col-sm-2 control-label">Loại tin</label>
                <div class="col-sm-10">
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                    <option>Xã hội</option>
                    <option>Xe</option>
                </select>
                </div>
                
              </div>
                <div class="form-group">
                <label for="" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                  <label>
                    <input type="radio" checked name="news_active" value="1" class="flat-red">
                    Active
                  </label>
                  <label>
                    <input type="radio" name="news_active" value="0" class="flat-red">
                    Not active
                  </label>
                </div>
              </div>
              <div class="form-group">
                 <label for="" class="col-sm-2 control-label">Nội dung</label>
                 <div class="col-sm-10">
                   <div class="box box-info">
                  <!-- /.box-header -->
                  <div class="box-body pad">
                    <form>
                      <textarea id="editor1" name="editor1" rows="10" cols="80">
                        Nội dung ...
                      </textarea>
                    </form>
                  </div>
                </div>
                 </div>
                 
              </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-danger btn-sm  btn-sm pull-right">Cancel</button>&nbsp
                <button type="submit" class="btn btn-info btn-sm pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@stop
@section('script')
<script>
  $(document).ready(function() {
    $('#get_outside_title').click(function(){
      $('#get_outside_box').slideDown();
    });
    $('#cancel_box_outside').click(function(){
      $('#get_outside_box')[0].reset();
      $('#get_outside_box').slideUp();
    });
  });
</script>
@stop
