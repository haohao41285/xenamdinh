<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Repositories\XeKhachRepository;
use App\Repositories\XeTaiRepository;
use App\Repositories\TaxiRepository;
use App\Repositories\TuyenDungRepository;
use App\Repositories\TinTucRepository;
use App\Repositories\TuyenRepository;
use App\Repositories\NewsRepository;
use App\Repositories\CustomerNewsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\NewsPathRepository;
use Laracasts\Presenter\PresentableTrait;
use App\Traits\HtmlDomTrait;
use App\Models\News;



class PageController extends Controller
{
    use HtmlDomTrait;
	use PresentableTrait;
	protected $page;
	protected $xe_khach;
	protected $xe_tai;
	protected $taxi;
	protected $tuyen_dung;
	protected $tin_tuc;
	protected $news;
    protected $news_path;
    protected $tuyen;
    protected $customer_news;
    protected $contact;
	protected $presenter="App\\Presenters\\TinTucPresenter";

	public function __construct(
		PageRepository $page,
		XeKhachRepository $xe_khach,
		XeTaiRepository $xe_tai,
		TaxiRepository $taxi,
		TuyenDungRepository $tuyen_dung,
		TinTucRepository $tin_tuc,
		NewsRepository $news,
        NewsPathRepository $news_path,
        TuyenRepository $tuyen,
        CustomerNewsRepository $customer_news,
        ContactRepository $contact
	)
	{
		$this->page = $page;
		$this->xe_khach = $xe_khach;
		$this->xe_tai = $xe_tai;
		$this->taxi = $taxi;
		$this->tuyen_dung = $tuyen_dung;
		$this->tin_tuc = $tin_tuc;
		$this->news = $news;
        $this->news_path = $news_path;
        $this->tuyen = $tuyen;
        $this->customer_news = $customer_news;
        $this->contact = $contact;
	}
	
	public function index()
	{
		$page=$this->page->findBySlug('/');
        
        $news = $this->customer_news->getNews();
        
        $tuyen_ids = $this->xe_khach->getDistinct('tuyen_id');

		if(view()->exists(THEME_PATH_VIEW. ".{$page->theme}"))
		{
			return view(THEME_PATH_VIEW. ".{$page->theme}",compact('news','tuyen_ids'));
		}
		abort(404);
	}

    public function show($theme)
    {
    	$stt=config('constants.stt');

    	if($theme == 'xe_khach' || $theme == 'xe_tai' || $theme == 'taxi')
    	{
            //$dia_chis = $this->$theme->getDistinct('dia_chi');

    		$xes = $this->$theme->getXes(AMOUNT_XE);

            if($theme == 'xe_khach')
            {
                $tuyen_ids = $this->$theme->getDistinct('tuyen_id');
            }
            if($theme == 'xe_tai')
            {
                $tai_trongs = $this->$theme->getDistinct('tai_trong');
            }
            if($theme == 'taxi')
            {
                $so_chos = $this->$theme->getDistinct('so_cho');
            }
    	}

    	if($theme == 'tuyen_dung')
    	{
    		$tuyen_dungs = $this->tuyen_dung->latest(AMOUNT_XE);
    	}

    	if($theme == 'tin_tuc')
    	{
            $news_last = $this->news->getLastNews();
            // Lấy các thành phần cho HTMLDomParser
            $html_path = $this->news_path->getElement('main_path');

            $list_path = $this->news_path->getElement('list');

            $e_ava = $this->news_path->getElement('ava_element');

            $e_title = $this->news_path->getElement('title_element');

            $e_href = $this->news_path->getElement('href_element');

            // Dùng HTMLDomParser lấy các giá trị 
    		$avas = $this->getElements($html_path,$list_path,$e_ava,'src');

            $hrefs = $this->getElements($html_path,$list_path,$e_href,'href');

            $titles = $this->getElements($html_path,$list_path,$e_title,'plaintext');
    		
    		foreach ($avas as $key =>$ava) {

                //Nếu không có tin mới thì không lưu
                if(isset($news_last->first_news) && $hrefs[$key] == $news_last->first_news)
                {
                    break;
                }

    			$a=[
    			 	
    			    'title' => $titles[$key],
    			    'ava' => $ava,
    			    'slug' => changeTitle($titles[$key]),
    			    'detail_path' => $hrefs[$key],
                    'first_news' => $hrefs[0],
    			];
                
    		    $this->news->create($a);
    		}
            
    		 $news = $this->news->latest(AMOUNT_NEWS);
    	}
    	return view(THEME_PATH_VIEW.".{$theme}",compact('so_chos','tuyen_ids','theme','tai_trongs','news','tuyen_dungs','xes','stt'));
    }
    public function search(Request $request,$theme)
    {
        $stt = config('constants.stt');

        //$dia_chis = $this->$theme->getDistinct('dia_chi');

        $input = $request->all();

        if($theme == 'xe_tai')
        {
            $tai_trongs = $this->$theme->getDistinct('tai_trong');
        }

        if($theme == 'xe_khach')
        {
            $tuyen_ids = $this->$theme->getDistinct('tuyen_id');
        }

        if($theme == 'taxi')
        {
            $so_chos = $this->$theme->getDistinct('so_cho');
        }

        $xes = $this->$theme->getXes(AMOUNT_XE,$input);

        unset($input['_token']);

        return view(THEME_PATH_VIEW.".$theme",compact('theme','xes','tai_trongs','stt','so_chos','tuyen_ids'));
    }
    public function contact(Request $request)
    {
        $input = $request->all();

        $this->contact->create($input);

        return redirect()->route('frontend.index')->with(['message'=>'Cảm ơn bạn đóng góp của bạn','attr'=>'primary']);
    }

}
