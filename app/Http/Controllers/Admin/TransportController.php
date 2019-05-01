<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoutingTransportRepository;

class TransportController extends Controller
{
   protected $routing_transport;

   public function __construct(RoutingTransportRepository $routing_transport){

      $this->routing_transport = $routing_transport;
   }
   public function index(){

   	return view('admin.transport.transport');
   }
   public function getEdit(){
      $routing_list = $this->routing_transport->datatable();

   	return view('admin.transport.transport-edit',compact('routing_list'));
   }
   public function postEdit(Request $request){
   	
   	return $request->all();
   }
}
