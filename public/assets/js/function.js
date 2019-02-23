function showBaoCao(xe_id,ten_xe,price)
{
	var html = "";
    var now = $.now();
	html += `
	<div class="alert alert-primary alert-dismissible fade show book" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> </button>
            <h4 class="text-align">Thông tin thêm</h4>
		    <div class="col-md-12 row">
                <div class="col-md-3">
                    <label>Hướng</label>
                    <select name="" id="way" class="form-control">
                         <option value="di">Đi</option>
                         <option value="ve">Về</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Số lượng</label>
                    <select name="" id="qty" class="form-control">
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Ngày</label>
                    <input type="date" id="date" class="form-control" />
                </div>
            </div><br>
		    <div  class="col-md-12 style="float:right>
                <input type="button"  
                onclick="book('${xe_id}','${ten_xe}','${price}','qty','date','way')" 
                class="btn btn-sm btn-danger" value="Thêm Vào Giỏ Vé">
            </div>
    </div>
	    `;
	$('.report').fadeIn().html(html);
}
function book(xe_id,ten_xe,price,qty_input,date_input,way_input)
{
    var way = $(`#${way_input}`).val();
    var date = $(`#${date_input}`).val();
    var qty = $(`#${qty_input}`).val();
    var linkAdd = $('meta[name=linkAdd]').attr('content');
    var _token = $('meta[name=token]').attr('content');

    var form_data = new FormData();
    form_data.append('way',way);
    form_data.append('date',date);
    form_data.append('qty',qty);
    form_data.append('xe_id',xe_id);
    form_data.append('ten_xe',ten_xe);
    form_data.append('price',price);
    form_data.append('_token',_token);
    
    $.ajax({
        url: linkAdd,
        type: 'POST',
        dataType: 'text',
        cache: false,//important
        contentType: false,//important
        processData: false,//important
        data: form_data,
    })
    .done(function(response) {
        $('.message_book').show(1000).hide(500);
        $('.book').hide();
        $('.count_ticket').text('('+response+')');
        //console.log(response);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    

}
function removeModal()
{
	$('.report').fadeOut();
}

function submitForm(form_id)
{
	$(`#${form_id}`).submit();
}

function toggleModal(from_id,to_id)
{
    $(`#${from_id}`).modal('toggle');
    $(`#${to_id}`).modal('show');
}

function displayModal(id_modal)
{
	$(`#${id_modal}`).modal('show');
}

function clearErrorMessages()
{
	$('.message-errors').remove();
}

function checkDate(parent)
{
    $("body").on("click", "label", function(e) {
    var getValue = $(this).attr("for");
    var goToParent = $(this).parents("."+parent);
    var getInputRadio = goToParent.find("input[id = " + getValue + "]");
    console.log(getInputRadio.attr("id"));  
   });
}

function readURL(input,id_img) {
        $(`#${id_img}`).show(); //Show image ,Use for firefox
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id_img).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
function openFile(file){

    $(`#${file}`).click();
}
 function playSound(sound_car){
    $(`#${sound_car}`).trigger('play');
}
function changeQty(that,rowId)
{
    var _token = $('meta[name=token]').attr('content');
    var qty = $(that).val();
    var linkCart = $('meta[name=linkCart]').attr('content');

    form_data = new FormData();
    form_data.append('_token',_token);
    form_data.append('qty',qty);
    form_data.append('rowId',rowId);

    $.ajax({
        url: linkCart,
        type: 'POST',
        dataType: 'text',
        data: form_data,
        cache: false, //important
        contentType: false, //important
        processData: false, //important
    })
    .done(function(response) {
        $('.cart').html(response);
        //console.log(response);
    })
    .fail(function() {
        console.log("error");
    });
    
}
function removeTicket(id)
{
    var form_data = new FormData();

    var _token = $('meta[name=token]').attr('content');

    var linkRemove = $('meta[name=linkRemove]').attr('content');

    form_data.append('_token',_token);
    form_data.append('id',id);
    $.ajax({
        url: linkRemove,
        type: 'POST',
        dataType: 'text',
        data: form_data,
        cache:false,
        contentType:false,
        processData:false,

    })
    .done(function(response) {
        $('.cart').html(response);
        //console.log(response);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}