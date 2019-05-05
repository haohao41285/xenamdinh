<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoutingTransportRepository;
use App\Repositories\TransportRepository;
use App\Repositories\CateTransportRepository;
use DataTables;

class TransportController extends Controller
{
   protected $routing_transport;

   public function __construct(
      RoutingTransportRepository $routing_transport,
      TransportRepository $transport,
      CateTransportRepository $cate_transport)
   {
      $this->routing_transport = $routing_transport;
      $this->cate_transport = $cate_transport;
      $this->transport = $transport;
   }
   public function index(){
    
    $input['route_active'] = "";

    $routing_list = $this->routing_transport->datatable($input);

    $cate_transport_list = $this->cate_transport->datatable();

   	return view('admin.transport.transport',compact('routing_list','cate_transport_list'));
   }
   public function getEdit($transport_slug= null ,$route = null){

      $transport_list = "";
      $transport_address = "";

      if($transport_slug != null && $route != null ){

         $transport_list = $this->transport->find_transport($transport_slug,$route);

         $transport_address = $transport_list->transport_address;

         $transport_address = json_decode($transport_list->transport_address,true);
      }
      $cate_transport_list = $this->cate_transport->datatable();

      $routing_list = $this->routing_transport->datatable();

   	return view('admin.transport.transport-edit',compact('routing_list','transport_list','cate_transport_list','transport_address'));
   }
   public function postEdit(Request $request,$id = 0){

   	$input = $request->all();

      $message = $this->transport->store($input);

      if($message == 1){

         $request->session()->flash('message','Insert Transport Success!');

         return redirect()->route('admin.transport.index');

      }elseif($message == 0|| $message == 3){

         $request->session()->flash('message','Name of Transport has already existed!');

         return back();

      }else{

         $request->session()->flash('message','Insert Update Success!');

         return redirect()->route('admin.transport.index');
      }
   }
   public function datatable(Request $request){

      $input = $request->all();

      $transport_list = $this->transport->database($input);

      return DataTables::of($transport_list)
             ->editColumn('transport_image',function($row){

               return '<img src="'.asset($row->transport_image).'" style="max-height:50px" alt="">';
             })
             ->editColumn('transport_route',function($row){

               return $row->routes->route_name;
             })
             ->editColumn('updated_by',function($row){

               return $row->users->name;
             })
             ->addColumn('action',function($row){
               return '<a href="'.route('admin.transport.getEdit').'" ><i class="fa fa-plus"></i></a> 
                       <a href="'.route('admin.transport.getEdit',[$row->transport_slug,$row->transport_route_id]).'" ><i class="fa fa-edit"></i></a> 
                        <a href="javascript:void(0)" id="'.$row->id.'" active="'.$row->transport_active.'" class="delete" ><i class="fa fa-trash-o"></i></a>';
             })
            ->rawColumns(['action','transport_image'])
            ->make(true);

   }
   public function addressResult(Request $request)
    {
        $input = $request ->all();

        $id = $input['id'];

        if($input['changeLink'] == 'yes')
        {
            $json = file_get_contents("wards.json");
        }
        else
        {
            $json = file_get_contents("districts.json");
        }
        
        $json_arr = json_decode($json,true);

        return view('frontend.layouts.partials.address_foreach',compact('json_arr','id'));

    }
    public function delete(Request $request){

      if($request->id){

        $this->transport->remove($request->id,$request->active);

        return "Processing Success!";

      }else{

        return "Processing Error!";
      }
    }
}
