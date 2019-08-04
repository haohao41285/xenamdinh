<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsCateRepository;
use App\Models\NewsCate;
use App\Validators\NewsCateValidator;

/**
 * Class NewsCateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsCateRepositoryEloquent extends BaseRepository implements NewsCateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsCate::class;
    }
    public function store($input){

        $this->create($input);
    }
    public function checkRouteName($input,$id){

        if($id == 0){

            return $this->model->select('id')->where('cate_news_slug',$input)->count();
        }
        else
            return $this->model->select('id')->where('id','!=',$id)
                                             ->where('cate_news_slug',$input)
                                             ->count();
    }
    public function getRoute($slug){

        return $this->model->where('cate_news_slug',$slug)->first();
    }
    public function datatable($input){
        
        $cate_news_list = $this->model->select('*');

        if($input['cate_news_active'] != ""){

            $cate_news_list = $cate_news_list->where('status',$input['cate_news_active']);
        }else
            $cate_news_list = $cate_news_list->where('status',1);

        return $cate_news_list;
    }
    public function update(array $input,$id){

        return $this->model->find($id)->update($input);

    }
    public function delete($id){

        $this->model->where('id',$id)->update(['status'=>0]);
    }
    public function getAllNewsCate(){
        return $this->model->where('status',1)->get();
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
