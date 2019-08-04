<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Traits\WebscraperTrait;
use App\Models\Weather;


class PageController extends Controller
{
    use WebscraperTrait;
    protected $news;

    public function __construct(
    	NewsRepository $news
    ){
    	$this->news=$news;
    }   
	public function index()
	{
		//GET WEATHER
		// $weather = [];
		// $title_weather = [];
		// $crawler = $this->getHtml('https://www.24h.com.vn/du-bao-thoi-tiet-c568.html');
		// $result_1 = $crawler->filter('.tabBttBody tr')->each(function ($node)  {

  //               return $weather[] = $node->html();
  //           });
		// $result_2 = $crawler->filter('.tabBttHead tr')->each(function($node){
		// 	return $title_weather[] = $node->html();
		// });

		// $arr_weather = [
		// 	'date_time' => $result_2[0],
		// 	'weather_detail' => $result_1[37]
		// ];
		// Weather::create($arr_weather);
		//END GET WEATHER
		$weather = Weather::first();
		$news_list = $this->news->getLatestNews();
		$news_most_read = $this->news->getMostRead();
		$news_hot = $this->news->newsHot();
		return view('themes.home',compact('news_most_read','news_list','news_hot','weather'));
	}
}
