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
         {
              "targets": 4,
              "className": "text-center",
         }
         ],
         ajax:{ url:get_data},
             columns: [

              { data: 'id', name: 'id' },
              { data: 'route_name', name: 'route_name' },
              { data: 'route_image', name: 'route_image'},
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
    
  });