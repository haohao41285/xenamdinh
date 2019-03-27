<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\NewsPathRepository;
use App\Repositories\CustomerNewsRepository;


use App\Traits\HtmlDomTrait;

class NewsController extends Controller
{
	use HtmlDomTrait;
	protected $news;
	protected $news_path;
	protected $customer_news;

	public function __construct(
		NewsRepository $news,
		NewsPathRepository $news_path,
		CustomerNewsRepository $customer_news
	)
	{
		$this->news = $news;
		$this->news_path = $news_path;
		$this->customer_news = $customer_news;
	}

    public function detail
    {
        return view('')
    }

    public function detail($slug)
    {
    	// lấy các thành phần cho HTMLDomParser
    	$html_path=$this->news_path->getElement('detail_path').$slug;

    	$list=$this->news_path->getElement('content');

    	$content=$this->getContent($html_path,$list);
    	
    	$related_news=$this->news->relatedNews();

    	return view('news.detail',compact('content','related_news'));
    }
    public function postNews(Request $request)
    {
    	$input = $request->all();

    	$this->customer_news->store($input);

    	$news = $this->customer_news->getNews($input['customer_id'],$input['parent_id']);
        //dd($news);

    	return view('frontend.layouts.partials.new_post',compact('news'));
    }
    public function delete($id)
    {
        $news = $this->customer_news->find($id);

        $customer = \Auth::guard('customer')->user();

        if(\Gate::forUser($customer)->denies('delete',$news)){

            return back()->with(['message'=>'Bạn không có quyền này','attr'=>'danger']);

        }else{

            $this->customer_news->delete($id);
            
            return back()->with(['message'=>'Đã xóa tin','attr'=>'primary']);
        }
       
    }

}
