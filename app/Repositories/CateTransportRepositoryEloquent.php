<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CateTransportRepository;
use App\Models\CateVehicle;
use App\Validators\CateTransportValidator;

/**
 * Class CateTransportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CateTransportRepositoryEloquent extends BaseRepository implements CateTransportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CateVehicle::class;
    }
    public function datatable(){

        return $this->model->where('cate_transport_active',1)->get();
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
