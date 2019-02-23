<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TaxiRepository;
use App\Models\Taxi;
use App\Validators\TaxiValidator;
use App\Traits\UploadPhotoTrait;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class TaxiRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TaxiRepositoryEloquent extends BaseRepository implements TaxiRepository
{
    use UploadPhotoTrait;
    use PresentableTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Taxi::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getXes($amount,$condition=[])
    {
        $xes = $this->model->orderBy('ten_xe','asc');

        if(isset($condition['so_cho']))
        {
            $xes->where('so_cho',$condition['so_cho']);
        }
        if(isset($condition['tinh']))
        {
            $xes->where('tinh',$condition['tinh']);
        }
        if(isset($condition['huyen']))
        {
            $xes->where('huyen',$condition['huyen']);
        }
        if(isset($condition['xa']))
        {
            $xes->where('xa',$condition['xa']);
        }
        return $xes->paginate($amount);
    }

    public function getDistinct($column)
    {

        $results = $this->model->select($column)->distinct()->orderBy($column,'asc')->get();

        return  $results;
    }

    public function store($input,$loai_xe)
    {
        $input['customer_id'] = \Auth::guard('customer')->user()->id;

        if (!$input['ava']) {
            $input['ava'] = 'html/images/taxi.png';
        }
        elseif ($input['ava']) {

            $input['ava']= $this->uploadPhoto($input['ava'],$input['ten_xe'],$loai_xe);
        }
        //dd($input);
        return $this->model->create($input);
    }
    
}
