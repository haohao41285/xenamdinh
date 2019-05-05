<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoutingTransportRepository;
use DataTables;

class RoutingTransportController extends Controller
{
	protected $routing_transport;

	public function __construct(RoutingTransportRepository $routing_transport){
		$this->routing_transport = $routing_transport;
	}
    public function index(){
    	return view('admin.routing_transport.index');
    }
    public function getEdit($slug = ""){

        $routing_transport = "";

        if($slug != ""){

            $routing_transport = $this->routing_transport->getRoute($slug);
        }
    	return view('admin.routing_transport.routing_transport_edit',compact('routing_transport'));
    }
    public function postEdit(Request $request){

    	$input = $request->all();

        $input['route_slug'] = changeTitle($input['route_name']);

        $id = $request->id;
        //return $id;

        if($id == 0){
            
            $check = $this->routing_transport->checkRouteName($input['route_slug'],$id);
            if($check != 0){

                $request->session()->flash('message','Routing Transport has already existed!');

                return back();
            }
            else{
                $this->routing_transport->store($input);
                $request->session()->flash('message','Insert Routing Transport Succsess!');
                return redirect()->route('admin.routing-transport.index');
            }

        }else{
            
            $check = $this->routing_transport->checkRouteName($input['route_slug'],$id);
            
            if($check != 0){

                $request->session()->flash('message','Routing Transport has already existed!');

                return back();
            }else{
                $request->session()->flash('message','Update Routing Transport Succsess!');
                $this->routing_transport->update($input,$id);
            }

        }
    	//CHECK EXIST ROUTE NAME
    	return redirect()->route('admin.routing-transport.index');
    }
    public function getData(Request $request){

        $input = $request->all();

        $route_list = $this->routing_transport->datatable($input);

        return DataTables::of($route_list)

               ->editColumn('route_image',function($row){

                return '<img style="max-height:100px" src="'.asset($row->route_image).'" alt="">';
               })
               ->editColumn('updated_by',function($row){

                return $row->users->name;
               })
               ->addColumn('action',function($row){

                return '<a href="'.route('admin.routing-transport.getEdit').'" ><i class="fa fa-plus"></i></a> 
                        <a href="'.route('admin.routing-transport.getEdit',$row->route_slug).'" ><i class="fa fa-edit"></i></a> 
                        <a href="javascript:void(0)" id="'.$row->id.'" active="'.$row->route_active.'" class="delete" ><i class="fa fa-trash-o"></i></a>';
               })

               ->rawColumns(['action','route_image'])
               ->make(true);
    }
    public function delete(Request $request){

        if(isset($request->id)){

        $this->routing_transport->remove($request->id,$request->active);

        return "Moving success!";
        }else
        return "Moving error!";
    }
}
