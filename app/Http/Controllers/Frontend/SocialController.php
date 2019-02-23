<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;

class SocialController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
    	if ($social == 'facebook') {

    		$customer = SocialAccountService::createOrGetUser(Socialite::driver($social)->fields(['first_name','last_name','email'])->user(), $social);
    	}
    	elseif ($social == 'google') {

    		$customer = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
    	}
        
        auth()->guard('customer')->login($customer);

        return redirect()->route('frontend.index');
    }
}
