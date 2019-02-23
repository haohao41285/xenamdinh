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

{{-- update qty in the bar menu --}}
<script>
  $('.count_ticket').text('('+{{ Cart::count()}}+')');
</script>