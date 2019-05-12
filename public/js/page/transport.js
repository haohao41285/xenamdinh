
$(function () {
    var get_data = $('meta[name=get_data]').attr('content');
    var table = $('#datatable').DataTable({
    	  dom: "lBfrtip",
        processing: false,
        serverSide: true,
        searching: false,
        
         columnDefs: [
         
         {
              "targets": 2,
              "className": "text-center",
         },
         {
              "targets": 4,
              "className": "text-center",
         }
         ],
         ajax:{ 
          url:get_data,
          method: 'POST',
          data:function(d){
            d.transport_cate_id = $('#transport_cate_id option:selected').val();
            d.transport_time_go = $('#transport_time_go option:selected').val();
            d.transport_time_back = $('#transport_time_back option:selected').val();
          }
         },
             columns: [

              { data: 'transport_name', name: 'transport_name' },
              { data: 'transport_route', name: 'transport_route' },
              { data: 'transport_average', name: 'transport_average'},
              { data: 'transport_phone', name: 'transport_phone' },
              { data: 'action' , name: 'action',  orderable: false, searchable: false }
                ],
    });
    $(document).on('click','.delete',function(e){
    	
    	var id = $(this).attr('id');
      var active = $(this).attr('active');
    	var get_route = $('meta[name=get_route]').attr('content');
    	var _token = $('meta[name=_token]').attr('content');

    	$.ajax({
    		url: get_route,
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
    		alert("Moving error!");
    		//console.log("error");
    	});
    	
    });
    $(document).on('click','.search',function(e){
      table.draw();
      e.preventDefault();
    });
    $(document).on('click','.reset',function(e){
      $('#routing_transport_form')[0].reset();
      table.draw();
      e.preventDefault();
    });
  });