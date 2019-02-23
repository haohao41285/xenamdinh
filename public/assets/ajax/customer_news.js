function postNews(content_input,file_input,img_input,li_input,parent_input) {
    
	var content = $(`#${content_input}`).val();
    if($(`#${file_input}`).prop('files')[0]){
        var type = $(`#${file_input}`).prop('files')[0].type;
    }
    var type_reg = /^image\/(jpg|png|jpeg|bmp|gif)$/;
    
    if(content == "" || (type && type_reg.test(type) == false) )
    {
    	alert("Không thể đăng tin");
    }else{

    	var file = $(`#${file_input}`).prop('files')[0];
        var customer_id = $('#customer_id').val();
	    var customer_name = $('#customer_name').val();
    	var date = $('#date').val();
    	var parent_id = $(`#${parent_input}`).val();
	    var _token  = $('input[name=_token]').val();
	    var linkPost = $('meta[name=linkPost]').attr('content');

        var form_data = new FormData();
        form_data.append('file', file);
        form_data.append('customer_id',customer_id);
        form_data.append('customer_name', customer_name);
        form_data.append('content', content);
        form_data.append('date', date);
        form_data.append('_token', _token);
        form_data.append('parent_id',parent_id);

    	$.ajax({
        url: linkPost, // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
     })
        .done(function(reponse) {
		    $(`#${content_input}`).val('');
		    $(`#${file_input}`).val('');
		    $(`#${img_input}`).attr('src',' ');
		    $(`#${img_input}`).hide();
		    $(`#${li_input}`).append(reponse);
		    //console.log(reponse);
	    })
	    .fail(function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        })
    }
}

function reply(event,content,file,img,li,parent_id)
{
	if (event.keyCode === 13 ) {

			return postNews(content,file,img,li,parent_id);
		}
}