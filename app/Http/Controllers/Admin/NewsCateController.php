<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsCateRepository;
use DataTables;

class NewsCateController extends Controller
{
	protected $news_cate;

	public function __construct(NewsCateRepository $news_cate){
		$this->news_cate = $news_cate;
	}
    public function index(){
    	return view('admin.news_cate.index');
    }
    public function getEdit($slug = ""){

        $news_cate = "";

        if($slug != ""){

            $news_cate = $this->news_cate->getRoute($slug);
        }
    	return view('admin.news_cate.news_cate_edit',compact('news_cate'));
    }
    public function postEdit(Request $request){

    	$input = $request->all();

        $input['cate_news_slug'] = changeTitle($input['cate_news_name']);

        $id = $request->id;
        //return $id;

        if($id == 0){
            

            $check = $this->news_cate->checkRouteName($input['cate_news_slug'],$id);
            if($check != 0){

                $request->session()->flash('message','News Cate Name has already existed!');

                return back();
            }
            else{
                $this->news_cate->store($input);
                $request->session()->flash('message','Insert News Cate Succsess!');
                return redirect()->route('admin.news_cate.index');
            }

        }else{
            
            $check = $this->news_cate->checkRouteName($input['cate_news_slug'],$id);
            
            if($check != 0){

                $request->session()->flash('message','News Cate Name has already existed!');

                return back();
            }else{
                $request->session()->flash('message','Update News Cate Succsess!');
                $this->news_cate->update($input,$id);
            }

        }
    	//CHECK EXIST ROUTE NAME
    	return redirect()->route('admin.news_cate.index');
    }
    public function getData(Request $request){

    	$input = $request->all();

        $news_cate_list = $this->news_cate->datatable($input);

        return DataTables::of($news_cate_list)

               ->editColumn('updated_by',function($row){

                return $row->users->name;
               })
               ->addColumn('action',function($row){

                return '<a href="'.route('admin.news_cate.getEdit').'" ><i class="fa fa-plus"></i></a> 
                        <a href="'.route('admin.news_cate.getEdit',$row->cate_news_slug).'" ><i class="fa fa-edit"></i></a> 
                        <a href="javascript:void(0)" id="'.$row->id.'" class="delete" ><i class="fa fa-trash-o"></i></a>';
               })

               ->rawColumns(['action'])
               ->make(true);
    }
    public function delete(Request $request){

        if(isset($request->id)){

        $this->news_cate->delete($request->id);

        return "Delete News Cate success!";
        }else
        return "Delete News Cate error!";
    }
}
