<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TicketRepository;
use App\Models\XeKhach;
use App\Mail\TicketMail;
use Cart;
use Mail;

class CartController extends Controller
{
	protected $ticket;

	public function __construct(
		TicketRepository $ticket
	)
	{
		$this->ticket = $ticket;
	}
    public function add(Request $request){
    	$input = $request->all();

    	Cart::add($input['xe_id'],$input['ten_xe'],$input['qty'],$input['price'],['way'=>$input['way'],'date'=>$input['date']]);

    	$count = Cart::count();

    	return $count;
    }
    public function getCart()
    {
    	return view('themes.cart');
    }
    public function update(Request $request)
    {
    	$input = $request->all();

    	Cart::update($input['rowId'],['qty'=>$input['qty']]);
    	
    	return view('cart.update');

    }
    public function remove(Request $request)
    {
    	$rowId = $request->id;

    	Cart::remove($rowId);

    	return view('cart.update');
    }
    public function destroy()
    {
    	Cart::destroy();

    	return back();
    }
    public function book(Request $request)
    {
    	$input = $request->all();

    	$result = $this->ticket->store($input);

    	$input['cart'] = Cart::content();

    	$input['tong_tien'] = Cart::subtotal();

    	$input['thue'] = Cart::tax();

    	$input['thanh_toan'] = Cart::total();

    	$when = now()->addMinutes(1);

    	Mail::to($input['email'],'Boss')->later($when, new TicketMail($input));
    	

    	$result??Cart::destroy();
    	
    	return redirect()->route('frontend.index')->with(['message'=>'Đặt vé thành công!<br>Vui lòng kiểm tra vé qua Email của bạn','attr'=>'primary']);
    }

}
