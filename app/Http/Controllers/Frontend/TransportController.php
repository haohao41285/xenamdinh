<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TransportRepository;
use DataTables;

class TransportController extends Controller
{
	protected $transport;

	public function __construct(
		TransportRepository $transport
	){
		$this->transport = $transport;
	}
	public function list(){
		return view('transport.list');
	}
    public function detail($slug,$route_id){

    	$transport_detail = $this->transport->find_transport($slug,$route_id);

    	return view('transport.detail',compact('transport_detail'));
    }
    public function getData(Request $request){

    	$input = $request->all();

    	$transport_list = $this->transport->database($input);

    	return DataTables::of($transport_list)

    	       ->editColumn('transport_name',function($row){
    	       	return ucfirst($row->transport_name);
    	       })
    	       ->editColumn('transport_route',function($row){
    	       	return ucfirst($row->routes->route_name);
    	       })
    	       ->editColumn('transport_phone',function($row){
    	       	if($row->transport_phone_add != ""){
    	       		return $row->transport_phone."<br>".$row->transport_phone_add;
    	       	}else
    	       	    return $row->transport_phone;
    	       })
    	       ->addColumn('action',function($row){
    	       	return '<a href="'.route('frontend.transport.detail',[$row->transport_slug,$row->transport_route_id]).'"><button class="btn btn-sm btn-info">Chi Tiết</button></a>';
    	       })
    	       ->rawColumns(['action','transport_phone'])
    	       ->make(true);
    }
}
