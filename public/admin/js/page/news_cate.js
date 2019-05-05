$(function () {
    var get_data = $('meta[name=get_data]').attr('content');
    var table = $('#datatable').DataTable({
    	dom: "lBfrtip",
        processing: true,
        serverSide: true,
        
         columnDefs: [
         {
              "targets": 0,
              "className": "text-center",
         },
         {
              "targets": 2,
              "className": "text-center",
         },
         {
              "targets": 3,
              "className": "text-center",
         },
         ],
         ajax:{ 
          url:get_data,
          data:function(d){
            d.cate_news_active = $('#cate_news_active option:selected').val();
          }
        },
             columns: [

              { data: 'id', name: 'id' },
              { data: 'cate_news_name', name: 'cate_news_name' },
              { data: 'updated_by', name: 'updated_by' },
              { data: 'action' , name: 'action',  orderable: false, searchable: false }
                ],
    });
    $(document).on('click','.delete',function(e){
    	
    	var id = $(this).attr('id');
    	var get_route = $('meta[name=get_route]').attr('content');
    	var _token = $('meta[name=_token]').attr('content');

    	$.ajax({
    		url: get_route,
    		type: 'POST',
    		dataType: 'html',
    		data: {id: id,_token : _token},
    	})
    	.done(function(data) {
    		table.draw();
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
      table.draw();
      e.preventDefault();
    });
    $(document).on('click','.reset',function(e){
      $('#cate_news_form')[0].reset();
      table.draw();
      e.preventDefault();
    });
    
  });