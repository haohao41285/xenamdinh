<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TransportRepository;
use App\Models\Vehicle;
use App\Validators\TransportValidator;

/**
 * Class TransportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TransportRepositoryEloquent extends BaseRepository implements TransportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vehicle::class;
        
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
