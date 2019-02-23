@extends('frontend.layouts.master')
@section('meta')
    <meta name="linkCart" content={{ route('frontend.ticket.update') }} />
    <meta name="linkRemove" content={{ route('frontend.ticket.remove') }} />
@endsection
@section('content')
<div class="container" style="margin: 3em">
<div class="row ">
	@if(Cart::count()>0)
	<div class="col-md-7 mainDetail__overview ">
		<h4 class="heading --4">GIỎ VÉ ĐÃ ĐẶT</h4>
		<table class="table table-striped table-hover cart">
   	<thead>
       	<tr>
           	<th>Nhà xe</th>
           	<th>Hướng</th>
           	<th>Ngày</th>
           	<th>Số lượng</th>
           	<th>Giá vé</th>
           	<th>Tổng tiền</th>
           	<th></th>
       	</tr>
   	</thead>

   	<tbody>

   		<?php foreach(Cart::content() as $row) :?>

       		<tr>
           		<td>{{ $row->name }}</td>
           		<td>{{ ($row->options->way == 've')?"Về":"Đi"  }}</td>
           		<td>{{ $row->options->date }}</td>
           		<td>
           			<select  id="" class="form-control col-md-8" style="margin: auto;padding:2px" onchange="changeQty(this,'{{ $row->rowId }}')">
           				@for ($i = 1; $i < 4 ;$i++)
           				    <option {{ ($row->qty==$i)?"selected":"" }} value="{{ $i }}">{{ $i }}</option>
           				@endfor
           			</select>
           		</td>
           		<td>{{ number_format($row->price,0) }} VND</td>
           		<td>{{ number_format($row->subtotal,0)  }} VND</td>
           		<td><span class="icon_trash" title="Xóa vé" onclick="removeTicket('{{ $row->rowId }}') "></span></td>
       		</tr>

	   	<?php endforeach;?>

   	</tbody>
   	
   	<tfoot>
   		<tr>
   			<td colspan="4"><a href="{{ route('frontend.ticket.destroy') }}">Xóa toàn bộ vé</a></td>
   			<td>Tổng tiền</td>
   			<td>{{  str_replace('.00', '',Cart::subtotal()) }} VND</td>
   		</tr>
   		<tr>
   			<td colspan="4">&nbsp;</td>
   			<td>Thuế GTGT(10%) </td>
   			<td>{{ str_replace('.00', '',Cart::tax()) }} VND</td>
   		</tr>
   		<tr>
   			<td colspan="4">&nbsp;</td>
   			<td>Thanh Toán</td>
   			<td>{{ str_replace('.00', '',Cart::total()) }} VND</td>
   		</tr>
   	</tfoot>
</table>
<div class="text-center">
<a href="{{ url('/xe_khach') }}"><h5><span class="icon_cart_alt"></span>Đặt Thêm Vé</h5></a>
</div>
	</div>
	<div class="col-md-4 offset-md-1 mainDetail__overview">
	    <h4 class="heading --4">THÔNG TIN KHÁCH HÀNG</h4>
		<form action="{{ route('frontend.ticket.book') }}" method="POST" id="form_infor_customer">
			{{ csrf_field() }}
			<div class="form-style">
			<div class="form-group">
				<label for="name"><b>Họ và tên</b></label>
				<input type="text" name="name" id="name" class="form-control form-sm" value="{{ $composer_customer?$composer_customer->customer_info->getPresenter()->fullName():'' }}" placeholder="Họ và Tên">
			</div>
			<div class="form-group">
				<label for="email">Địa chỉ email</label>
				<input type="email" name="email" id="email" class="form-control form-sm" value="{{ ($composer_customer)?$composer_customer->email:""}}"placeholder="Đia Chỉ Email">
			</div>
			<div class="form-group">
				<label for="phone">Số Điện Thoại</label>
				<input type="text" name="phone" id="phone" class="form-control form-sm" placeholder="Số điện thoại">
			</div>
			<div class="form-group">
				<label for="address">Địa chỉ người nhận</label>
				<input type="text" name="address" id="address" class="form-control form-sm" placeholder="Địa chỉ người nhận">
			</div>
			<div class="form-group">
				<label for="note">Ghi chú</label>
				<textarea type="text" name="note" id="note" class="form-control form-sm" placeholder="Ghi chú" ></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Đặt" class="btn btn-sm btn-primary">
			</div>
			</div>
		</form>
	</div>
	@else
	<div class="text-ailgn col-md-4 offset-md-4">
		<div class="row text-align">
			<h4 class="heading text-align ">Giỏ vé trống</h4>
			<span class="arrow_triangle-right"></span>
			<span class="arrow_triangle-right"></span>
			<span class="arrow_triangle-right"></span>
			<a href="{{ url('/xe_khach') }}"><h5>Đặt vé</h5></a>
		</div>
	<img style="width: 100%" src="{{ asset('html/images/cart.png') }}" alt="">
	</div>
	
	@endif
</div>
</div>
@endsection