
<div>
  <h4>Thông Tin Khách Hàng</h4>
  <p>Họ Tên: {{ $ticket['name'] }}</p>
  <p>Email: {{ $ticket['email'] }}</p>
  <p>Địa chỉ: {{ $ticket['address'] }}</p>
  <p>Số Điện Thoại: {{ $ticket['phone'] }}</p>
  <p style="color: red">Ghi chú: {{ $ticket['note'] }}</p>
</div>

<h4>Thông tin Vé</h4>
<tr>
    <td colspan="4">Tổng Tiền :</td>
    <td>{{ str_replace('.00', '',$ticket['tong_tien'] ) }} VND</td>
  </tr>
  <tr>
    <td colspan="4">Thuế GTGT :</td>
    <td>{{ str_replace('.00', '',$ticket['thue'] ) }} VND</td>
  </tr>
  <tr>
    <td colspan="4">Thanh Toán :</td>
    <td>{{ str_replace('.00', '',$ticket['thanh_toan'] ) }} VND</td>
  </tr>
<table style="border:1px dashed black">
  <tr>
    <th>Nhà Xe</th>
    <th>Ngày Đi</th>
    <th>Hướng</th>
    <th>Giá Vé</th>
    <th>Số Lượng</th>
  </tr>

  @foreach($ticket['cart'] as $ticket)

  <tr>
    <td>{{ $ticket->name }}</td>
    <td>{{ $ticket->options->date }}</td>
    <td>{{ $ticket->options->way }}</td>
    <td>{{ $ticket->price }}</td>
    <td>{{ $ticket->qty }}</td>
  </tr>

  @endforeach
  
</table>
<h4>Cảm ơn bạn đã đặt vé tại </h4><a style="color: red" href="{{ route('frontend.index') }}">ricenow.com</a>


