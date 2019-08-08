<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Traits\WebscraperTrait;
use App\Models\Weather;
use App\Models\Menu;


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
		//GET MENU

     //    $menu_list = Menu::where('status',1)->get();
	    // $data = collect($menu_list);
	    // $menu_arr = [];
     //    return self::getMenu($menu_arr,$data);

		$weather = Weather::first();
		$news_list = $this->news->getLatestNews();
		$news_most_read = $this->news->getMostRead();
		$news_hot = $this->news->newsHot();
		return view('themes.home',compact('news_most_read','news_list','news_hot','weather'));
	}
	// public static function getMenu($menu_arr,$data,$parent_id = 0,$text = ''){
	//     foreach($data as $key => $menu){
	//         if($menu->parent_id == $parent_id){
	//             $menu_arr[] = $menu->title.$text;
	//             self::getMenu($menu_arr,$data,$menu->id,$text .'--');
	//         }
	//     }
	//     return $menu_arr;
	// }
}
