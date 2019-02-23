<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsPathRepository;
use App\Models\NewsPath;
use App\Validators\NewsPathValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class NewsPathRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsPathRepositoryEloquent extends BaseRepository implements NewsPathRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsPath::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function getElement($content)
    {
        $element = $this->model->select($content)->where('active',1)->first();
        return $element->$content;
    }
    
}
