<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\WebscraperTrait;
use App\Repositories\NewsRepository;
use App\Repositories\NewsCateRepository;
use App\Models\Source;
use App\Models\NewsCate;
use App\Models\News;
use DataTables;
use Session;

class NewsController extends Controller
{
    use WebscraperTrait;

    protected $news;
    protected $news_cate;
    public function __construct(
        NewsRepository $news,
        NewsCateRepository $news_cate
    ){
        $this->news = $news;
        $this->news_cate = $news_cate;
    }

    public function viewNews(){

        $news_cate_list = $this->news_cate->getAllNewsCate();

    	return view('admin.news.news',compact('news_cate_list')); 
    }
    public function newsGetData(Request $request){
         $result = [];

         if( $request->img_element != "" && $request->img_element != "" && $request->href_element!= ""){
            $crawler = $this->getHtml($request->source_path);

            $image_arr = [];
            $title_arr = [];
            $href_arr = [];

            $result_1 = $crawler->filter($request->img_element)->each(function ($node)  {

                return $image_arr[] = $node->attr('src');
            });
            
            $result_2 = $crawler->filter($request->title_element)->each(function ($node)  {

                return  $title_arr[] = $node->text();
            });
            $result_3 = $crawler->filter($request->href_element)->each(function ($node)  {

                return $href_arr[] =  $node->attr('href');
            });
            

            $position = 0;
            foreach ($result_1 as $key => $img) {
                $result[] = [
                    'position' => $position++,
                    'title' => $result_2[$key],
                    'image' => $img,
                    'href' =>$result_3[$key],
                    'source' => $request->source,
                    'detail_path' =>$request->detail_path,
                    'news_cate_id' => $request->news_cate_id
                ];
            }
            Session::put('new_session',$result);

        }else{
            Session::put('new_session',[]);

            $result[] = [
                'position' => '',
                'title' => '',
                'image' => '',
                'href' =>''
            ];
        }
         return DataTables::of($result)
                        ->editColumn('image',function($row){
                            return '<img src="'.$row['image'].'" style="max-width:100px" alt="">';
                        })
                        ->rawColumns(['image'])
                        ->make(true);
    }
    public function saveSource(Request $request){
        $arr = [
            'source' => $request->source,
            'source_path' => $request->source_path,
            'img_element'=> $request->img_element,
            'title_element'=>$request->title_element,
            'href_element' => $request->href_element,
            'detail_path'=>$request->detail_path,
            'status'=>1
        ];
        Source::create($arr);
        //return $request->all();
    }
    public function newsAdd(){

        $source_list = Source::whereStatus(1)->first();

        $cate_list = NewsCate::whereStatus(1)->get();

        return view('admin.news.news-add',compact('source_list','cate_list'));
    }
    public function saveNews(Request $request){

        $news_list = Session::get('new_session');

        $last_news = $this->news->getLastNews()->first_news;

        if($news_list != []){

            foreach ($news_list as $key => $news) {

                if($last_news == $news['href']){

                    return redirect()->route('news-index');
                }
                $url = $news['detail_path'].$news['href'];

                $crawler = $this->getHtml($url);

                $result_1 = $crawler->filter('.content-news-detail')->each(function ($node)  {

                        return $content[] = $node->html();
                    });
                $result_2 = $crawler->filter('.title')->each(function ($node)  {

                        return $title[] = $node->text();
                    });
                $news_arr = [
                    'title' => $result_2[0],
                    'content' => $result_1[0],
                    'image' => $news['image'],
                    'news_cate' => $news['news_cate_id'],
                    'href' => $news['href'],
                    'source' => $news['source'],
                    'status' => 1,
                    'first_news' => $news_list[0]['href']
                ];

                News::create($news_arr);
            }

            return redirect()->route('news-index');
        }
        else{

            return back();
        }

    }
    public function getNewsDatabase(Request $request){

        $input = $request->all();

        $news_list = $this->news->datatable($input);
        
        return DataTables::of($news_list)

                ->editColumn('news_cate',function($row){
                    return $row->cate->cate_news_name;
                })
                ->editColumn('content',function($row){
                    return summaryTitle($row->content,200);
                })
                ->addColumn('action',function($row){

                return '<a href="'.route('admin.news_cate.getEdit').'" ><i class="fa fa-plus"></i></a> 
                        <a href="" ><i class="fa fa-edit"></i></a> 
                        <a href="javascript:void(0)" id="'.$row->id.'" class="delete" ><i class="fa fa-trash-o"></i></a>';
               })

               ->rawColumns(['action'])
                ->make(true);
    }
     public function delete(Request $request){

        if(isset($request->id)){

        $this->news->delete($request->id);

        return "Delete News success!";
        }else
        return "Delete News error!";
    }
}
