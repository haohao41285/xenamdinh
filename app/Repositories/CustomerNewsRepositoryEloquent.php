<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerNewsRepository;
use App\Models\CustomerNews;
use App\Validators\CustomerNewsValidator;
use App\Traits\UploadPhotoTrait;

/**
 * Class CustomerNewsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomerNewsRepositoryEloquent extends BaseRepository implements CustomerNewsRepository
{
    use UploadPhotoTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerNews::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function store($input)
    {
        if($input['file'] == "undefined"){

            return $this->create($input);
        }
        else{

            $input['file'] = $this->uploadPhoto($input['file'],$input['customer_name'],"news");

            $this->create($input);
        }
    }
    public function getNews($customer_id = null,$parent_id = 0)
    {
        if($customer_id){

            $news = $this->model->whereCustomerId($customer_id)->whereParentId($parent_id)->latest()->first();
        }
        else
            $news = $this->model->whereParentId($parent_id)->orderBy('created_at','desc')->get();

        return $news;
       
    }
    
}
