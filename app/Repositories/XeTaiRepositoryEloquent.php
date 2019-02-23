<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\XeTaiRepository;
use App\Models\XeTai;
use App\Validators\XeTaiValidator;
use App\Traits\UploadPhotoTrait;

/**
 * Class XeTaiRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class XeTaiRepositoryEloquent extends BaseRepository implements XeTaiRepository
{
    use UploadPhotoTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return XeTai::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function getXes($amount, $condition=[])
    {
        $xes = $this->model->orderBy('ten_xe','asc');
        if(isset($condition['tai_trong']))
        {
            $xes->where('tai_trong',$condition['tai_trong'])->get();
        }
        if(isset($condition['tinh']))
        {
            $xes->where('tinh',$condition['tinh'])->get();
        }
        if(isset($condition['huyen']))
        {
            $xes->where('huyen',$condition['huyen'])->get();
        }
        if(isset($condition['xa']))
        {
            $xes->where('xa',$condition['xa'])->get();
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
            $input['ava'] = 'html/images/truck.png';
        }
        elseif ($input['ava']) {

            $input['ava']= $this->uploadPhoto($input['ava'],$input['ten_xe'],$loai_xe);
        }
        //dd($input);
        return $this->model->create($input);
    }
}
