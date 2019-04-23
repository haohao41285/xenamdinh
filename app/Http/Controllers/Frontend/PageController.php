<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HTMLDomParser;

class PageController extends Controller
{
   
	public function index()
	{
		return view('themes.home');
	}

   
}
