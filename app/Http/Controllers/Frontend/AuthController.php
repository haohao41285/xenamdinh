<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests\Frontend\SignUpRequest;
use App\Http\Requests\Frontend\InfoRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use App\Repositories\XeKhachRepository;
use App\Repositories\XeTaiRepository;
use App\Repositories\TaxiRepository;
use App\Mail\sendActiveAccountEmail;
use App\Models\Customer;
use Hash;
use Auth;
use Mail;
use DB;

class AuthController extends Controller
{
	protected $customer;
    protected $xe_khach;
    protected $xe_tai;
    protected $taxi;

	public function __construct(
		CustomerRepository $customer,
        XeKhachRepository $xe_khach,
        XeTaiRepository $xe_tai,
        TaxiRepository $taxi
	)
	{
		$this->customer = $customer;
        $this->xe_khach = $xe_khach;
        $this->xe_tai = $xe_tai;
        $this->taxi = $taxi;
	}
    public function registry(SignUpRequest $request)
    {
    	$input=$request->all();
        //dd($input);

    	$email = $input['customer']['email'];

    	$result = $this->customer->store($input);
    	
        Auth::guard('customer')->login($result);

        $customer_info = $this->customer->getCustomerInfo($email); 
        //$when = now()->addMinutes(1);

        //queue send mail (delay send mail)
        dispatch(new \App\Jobs\sendActiveAccountJob($customer_info,$email))->delay(now()->addMinutes(10));

        if (isset($input['chu_xe'])) {
            $request->session()->flash('inforModal','inforModal');
        }

        return back();

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
    public function registryCar(InfoRequest $request,$xe)
    {
    	$input = $request->all();

        $this->$xe->store($input,$xe);

    	dd($xe);
    }
    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('frontend.index');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $remember_me =(isset($input['remember_me']))?"true":"false";

        $customer = Customer::where('email',$input['email'])->first();

        if ($customer && Hash::check($input['password'],$customer->password)){
            Auth::guard('customer')->login($customer,$remember_me);
        }else
        {
            $request->session()->flash('error_login',trans('frontend.header.login.error'));
        }
        return back();

    }
    public function infor($id)
    {
        $infors = $this->customer->getInfor($id);
        //dd($infors);

        return view('customer.infor',compact('infors'));
    }
}
