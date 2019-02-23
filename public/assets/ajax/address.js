function changeProvince(address_id,change_id,address = null)
    {
        var id = $(`#${address_id}`).val();

        var title =$(`#${address_id} option:selected`).text();

        var linkDatatable = $('meta[name=linkDatatable]').attr('content');

        var changeLink = address;

        $.ajax({
        	url: linkDatatable,
        	type: 'GET',
        	dataType: 'html',
        	data:"id="+id+"&title="+title+"&changeLink="+address,
        })

        .done(function(response) {
        	$(`#${change_id}`).html(response);
            //console.log(response);
        })

        .fail(function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        })    
        
    }