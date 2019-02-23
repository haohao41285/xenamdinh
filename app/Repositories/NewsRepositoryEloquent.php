<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsRepository;
use App\Models\News;
use App\Validators\NewsValidator;
use HTMLDomParser;

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
}
