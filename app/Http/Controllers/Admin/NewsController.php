<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HTMLDomParser;

class NewsController extends Controller
{
    public function viewNews(){
    	$context = stream_context_create(array(
		    'http' => array(
		        'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
		    ),
		));

		$html = file_get_contents('https://autopro.com.vn/van-hoa-xe.chn', false, $context);
    	// $html=HTMLDomParser::file_get_html("https://autopro.com.vn/van-hoa-xe.chn");
        return $html;

    	//return view('admin.news');
    }
}
