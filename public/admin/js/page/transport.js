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
              "targets": 1,
              "className": "text-left",
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
         },
         {
              "targets": 5,
              "className": "text-center",
         }
         ],
         ajax:{ 
          url:get_data,
          data: function(d){
            d.transport_cate_id = $('#transport_cate_id option:selected').val();
            d.transport_route_id = $('#transport_route_id option:selected').val();
            d.transport_active = $('#transport_active option:selected').val();
          }},
             columns: [

              { data: 'id', name: 'id' },
              { data: 'transport_name', name: 'transport_name'},
              { data: 'transport_image', name: 'transport_image'},
              { data: 'transport_route', name: 'transport_route'},
              { data: 'updated_by', name: 'updated_by'},
              { data: 'action' , name: 'action',  orderable: false, searchable: false }
                ],
    });
    $(document).on('click','.delete',function(e){
    	
    	var id = $(this).attr('id');
      var active = $(this).attr('active');
    	var linkDelete = $('meta[name=linkDelete]').attr('content');
    	var _token = $('meta[name=_token]').attr('content');

    	$.ajax({
    		url: linkDelete,
    		type: 'POST',
    		dataType: 'html',
    		data: {id: id,_token : _token,active : active},
    	})
    	.done(function(data) {
    		table.draw();
    	    e.preventDefault();
    		alert(data);
    		// console.log(data);
    	})
    	.fail(function() {
    		alert("Processing ERROR!");
    		console.log("error");
    	});
    	
    });
    $(document).on('click','.search',function(e){
      table.draw();
      e.preventDefault();
    })
    
  });