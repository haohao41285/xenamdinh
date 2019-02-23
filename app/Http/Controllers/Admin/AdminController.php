<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function welcome($name)
    {
    	echo "xin chào ".$name;
    }
}
