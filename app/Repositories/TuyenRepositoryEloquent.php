<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TuyenRepository;
use App\Models\Tuyen;
use App\Validators\TuyenValidator;

/**
 * Class TuyenRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TuyenRepositoryEloquent extends BaseRepository implements TuyenRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tuyen::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function findTenTuyen($id)
    {
        $ten_tuyen = $this->model->find($id);
        return $ten_tuyen;
    }
}
