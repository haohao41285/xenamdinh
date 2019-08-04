@extends('admin.layouts.master')
@section('style')
<style>
  .important{
  color:red;
}
</style>

@stop
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
            <form action="" id="get_outside_box" class="form-horizontal" method="post" accept-charset="utf-8">
              <div class="form-group">
                  <label for="source" class="col-sm-2 control-label">Source<span class="important">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="source" id="source" value="{{$source_list?$source_list->source:old('source')}}" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="source_path" class="col-sm-2 control-label">Source Path<span class="important">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="source_path" id="source_path"  value="{{$source_list?$source_list->source_path:old('source_path')}}"  >
                  </div>
              </div>
              <div class="form-group">
                  <label for="title_element" class="col-sm-2 control-label">Title Element<span class="important">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="title_element" id="title_element" value="{{$source_list?$source_list->title_element:old('title_element')}}" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="img_element" class="col-sm-2 control-label">Img Element<span class="important">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="img_element" id="img_element" value="{{$source_list?$source_list->img_element:old('img_element')}}">
                  </div>
              </div>
              <div class="form-group">
                  <label for="href_element" class="col-sm-2 control-label">Href Element<span class="important">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" required class="form-control" name="href_element" id="href_element" value="{{$source_list?$source_list->href_element:old('href_element')}}">
                  </div>
              </div>
              <div class="form-group">
                  <label for="detail_path" class="col-sm-2 control-label">Detail Path</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="detail_path"  id="detail_path" value="{{$source_list?$source_list->detail_path:old('detail_path')}}">
                  </div>
              </div>
              <div class="form-group">
                  <label for="news_cate_id" class="col-sm-2 control-label">Cate News</label>
                  <div class="col-sm-10">
                    <select name="news_cate_id" id="news_cate_id" class="form-control form-control-sm">

                      @foreach($cate_list as $cate)
                      <option value="{{$cate->id}}">{{$cate->cate_news_name}}</option>
                      @endforeach

                    </select>
                  </div>
              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger btn-sm  pull-right" id="cancel_box_outside">Close</button>&nbsp
                <input type="button" value="Get Data" id="get-data" class="btn btn-sm btn-primary pull-right">
                <input type="button" value="Save Source" id="save-source" class="btn btn-sm btn-info pull-right">
              </div>
            </form>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="news-get-table" class="table table-bordered table-striped">
                  <thead>

                  <tr>
                    <th class="text-center">Position</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Href</th>
                  </tr>
                  </thead>
                  </tfoot>
                </table>
              <a href="{{route('save-news')}}" title=""><button type="button" class="pull-right btn-primary btn">Save</button></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
      //$('#get_outside_box')[0].reset();
      $('#get_outside_box').slideUp();
    });

    $("#get-data").click(function(e){
      sTable.draw();
    });

    sTable = $('#news-get-table').DataTable({
             dom: "lBfrtip",
             processing: true,
             serverSide: true,

             buttons: [
             ],
             columnDefs: [
             {
                  "targets": 0,
                  "className": "text-center",
             },
             {
                  "targets": 1, 
                  "className": "text-center"
             },
             {
                  "targets": 2,
                  "className": "text-left",
             },
             {
                  "targets": 3,
                  "className": "text-left",
             },
             ],
             ajax:{ url:"{{ route('news-get-data') }}",
                 data: function (d) {
                        d.source_path = $('#source_path').val();
                        d.title_element = $('#title_element').val();
                        d.img_element = $('#img_element').val();
                        d.href_element = $('#href_element').val();
                        d.source = $('#source').val();
                        d.detail_path = $('#detail_path').val();
                        d.news_cate_id = $("#news_cate_id option:selected").val();
                    }
                  },
                 columns: [

                          { data: 'position', name: 'position' },
                          { data: 'title', name: 'title' },
                          { data: 'image', name: 'image' },
                          { data: 'href', name: 'href' },
                ],                 
       });

    $("#save-source").click(function(){
      var source = $("#source").val();
      var source_path = $("#source_path").val();
      var img_element = $("#img_element").val();
      var href_element = $("#href_element").val();
      var detail_path = $("#detail_path").val();
      var title_element = $("#title_element").val();
      if(source == "" || source_path == "" || img_element == "" || href_element == "" || title_element == "" )
        alert('empty');
      else{
        data = $("#get_outside_box").serialize();
        $.ajax({
          url: '{{route('save-source')}}',
          type: 'GET',
          dataType: 'html',
          data: data,
        })
        .done(function(data) {
          console.log(data);
        })
        .fail(function() {
          console.log("error");
        });
        
      }

    })
  });
</script>
@stop
