<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsRepository;
use App\Models\News;
use App\Validators\NewsValidator;
//use HTMLDomParser;

/**
 * Class NewsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function relatedNews()
    {
        $all = $this->model->inRandomOrder()->limit(51)->get();
        $news = $all->splice(0,3);
        return $news;
    }
    public function create($array)
    {
        $this->model->create($array);
    }
    public function latest($amount)
    {
        $model = $this->model->orderBy('created_at','desc')->paginate($amount);
        return $model;
    }
    public function getLastNews()
    {
        $model = $this->model->select('first_news')->latest()->first();
        return $model;
    }
    public function delete($id){

        $this->model->where('id',$id)->update(['status'=>0]);
    }
    public function datatable($input){
        
        $news_list = $this->model->select('*');

        if($input['status'] != "")

            $news_list = $news_list->where('status',$input['status']);

        if($input['status'] == "")

            $news_list = $news_list->where('status',1);

        if($input['news_cate'] != "")

            $news_list = $news_list->where('news_cate',$input['news_cate']);

        return $news_list;
    }

    //FRONTEND
    public function getLatestNews($amount = 10){
        $news_list = $this->model->select('id','title','href','image','updated_at','news_cate')
                                 ->where('status',1)
                                 ->latest()
                                 ->paginate($amount);
        return $news_list;
    }
    public function getMostRead($news_cate = 1,$amount = 5){
        $news_most_read = $this->model->select('id','title','href','image','updated_at','news_cate')
                                    ->where('status',1)
                                    ->orderBy('turn_read','desc')
                                    ->where('news_cate',$news_cate)
                                    ->paginate($amount);
        return $news_most_read;
    }
    public function newsHot(){
        $news_hot = $this->model->select('id','title','href','image','updated_at','news_cate')
                            ->where('status',1)
                            ->where('news_hot',1)
                            ->latest()
                            ->first();
        return $news_hot;
    }
}
