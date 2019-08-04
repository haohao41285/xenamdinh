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
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
	<section class="content">
	      <div class="row">
	        <div class="col-xs-12">
	          <div class="box">
              <br>
              <div class="col-md-12">
                <form action="" method="" id="news_form" accept-charset="utf-8">
                  <div class="col-md-2">
                  <select name="news_cate" class="form-control form-control-sm" id="news_cate">
                    <option value="">News Cate</option>
                    @foreach($news_cate_list as $news_cate)
                    <option value="{{$news_cate->id}}">{{$news_cate->cate_news_name}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="col-md-2">
                  <select name="status" class="form-control form-control-sm" id="status">
                    <option value="">Status</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                  </select>
                  </div>
                  <div class="col-md-2">
                      <button type="button" class="search btn btn-sm btn-primary">Search</button>
                      <button type="button" class="reset btn btn-sm btn-danger">Reset</button>
                  </div>
                  <div class="col-md-2">
                      <a href="{{route('admin.news_cate.getEdit')}}" title=""><button type="button" class="btn btn-sm btn-info">Add New</button></a>
                  </div>
                </form>
              </div>
              <hr>
	            <div class="box-header">
	              <h3 class="box-title">DataTable News</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="news-list" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th class="text-center">Position</th>
	                  <th class="text-center">Title</th>
	                  <th class="text-center">Image</th>
	                  <th class="text-center">Content</th>
	                  <th class="text-center">News Cate</th>
	                  <th class="text-center">Action</th>
	                </tr>
	                </thead>
	                </tfoot>
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
<script>
  $(function () {
    sTable = $('#news-list').DataTable({
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
             {
                  "targets": 4,
                  "className": "text-left",
             },
             {
                  "targets": 5,
                  "className": "text-center",
             },
             ],
             ajax:{ url:"{{ route('news-get-database') }}",
                 data: function (d) {
                        d.news_cate = $('#news_cate option:selected').val();
                        d.status = $('#status option:selected').val();
                    }
                  },
                 columns: [

                          { data: 'id', name: 'id' },
                          { data: 'title', name: 'title' },
                          { data: 'image', name: 'image' },
                          { data: 'content', name: 'content' },
                          { data: 'news_cate', name: 'news_cate'},
                          { data: 'action', name: 'action'}

                ],                 
       });
    $(document).on('click','.delete',function(e){
      
      var id = $(this).attr('id');
      var _token = $('meta[name=_token]').attr('content');

      $.ajax({
        url: '{{route('admin.news.delete')}}',
        type: 'POST',
        dataType: 'html',
        data: {id: id,_token : _token},
      })
      .done(function(data) {
        sTable.draw();
          e.preventDefault();
        alert(data);
        // console.log(data);
      })
      .fail(function() {
        alert("Delete routing error!");
        console.log("error");
      });
      
    });
    $(document).on('click','.search',function(e){
      sTable.draw();
      e.preventDefault();
    });
    $(document).on('click','.reset',function(e){
      $('#news_form')[0].reset();
      sTable.draw();
      e.preventDefault();
    });

  });
</script>
@stop