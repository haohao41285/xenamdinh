<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TuyenDungRepository;
use Gate;
use Auth;

class WorkController extends Controller
{
	protected $tuyen_dung;

	public function __construct(
		TuyenDungRepository $tuyen_dung
	)
	{
		$this->tuyen_dung = $tuyen_dung;
	}
    public function update($id)
    {
    	$post = $this->tuyen_dung->find($id);

    	$customer = Auth::guard('customer')->user();

    	if(Gate::forUser($customer)->denies('update',$post)){

    		return redirect()->route('frontend.index');

    	}else
    	    return view('tuyen_dung.detail_tuyen_dung',compact('post','id'));
    }
    public function updateWork(Request $request,$id)
    {
    	$input = $request->all();

    	$update = $this->tuyen_dung->update($input,$id);

    	if($update){

    		$request->session()->flash('message','Cập nhật thành công');
            $request->session()->flash('attr','success');

    	}else
        {
            $request->session()->flash('message','Cập nhật lỗi');
            $request->session()->flash('attr','danger');
        }
        return redirect()->route('frontend.index');
    }
    public function delete($id)
    {
    	$post = $this->tuyen_dung->find($id);

    	$customer = Auth::guard('customer')->user();

    	if(Gate::forUser($customer)->allows('delete',$post)){

    		$this->tuyen_dung->delete($id);

    		return back();

    	}else{
    	
    	    return back()->with(['message'=>'Bạn không có quyền với mục này!','attr'=>'danger']);
    	}
    	
    }
}
