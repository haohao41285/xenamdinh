<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\XeKhachRepository;
use App\Validators\XeKhachValidator;
use App\Traits\UploadPhotoTrait;
use App\Models\XeKhach;

/**
 * Class XeKhachRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class XeKhachRepositoryEloquent extends BaseRepository implements XeKhachRepository
{
    use UploadPhotoTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return XeKhach::class;
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

        if(isset($condition['tuyen_id']))
        {
            $xes->where('tuyen_id',$condition['tuyen_id']);
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
        if(isset($condition['thoi_gian_di']))

        {
            $thoi_gian_di = $condition['thoi_gian_di'];
            $xes->whereHas('thoi_gian',function($q)use($thoi_gian_di)
            {
                $q->where('thoi_gian_di',$thoi_gian_di);
            });
        }
        if(isset($condition['thoi_gian_ve']))

        {
            $thoi_gian_ve = $condition['thoi_gian_ve'];
            $xes->whereHas('thoi_gian',function($q)use($thoi_gian_ve)
            {
                $q->where('thoi_gian_ve',$thoi_gian_ve);
            });
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
        DB::beginTransaction();

        $input['xe']['customer_id']=\Auth::guard('customer')->user()->id;

        // Upload Ảnh đai diện
        if (!$input['xe']['ava']) {
            $input['xe']['ava'] = 'html/images/bus.jpg';
        }
        elseif ($input['xe']['ava']) {

            $input['xe']['ava']= $this->uploadPhoto($input['xe']['ava'],$input['xe']['ten_xe'],$loai_xe);
        }

        $xe_khach = $this->model->create($input['xe']);

        // Thêm thời gian đi vè của xe vào bảng
        $count_tgd = count($input['thoi_gian']['thoi_gian_di']);

        $count_tgv = count($input['thoi_gian']['thoi_gian_ve']);

        if ($count_tgd >= $count_tgv) {

            foreach ($input['thoi_gian']['thoi_gian_di'] as $key => $tgd) 
            {
                if ( empty($input['thoi_gian']['thoi_gian_ve'][$key]) ) {
                    $tgv = null;
                }
                else 
                $tgv = $input['thoi_gian']['thoi_gian_ve'][$key];

                $arr = [
                    'thoi_gian_di' => $tgd,
                    'thoi_gian_ve' => $tgv
                ];
                $thoi_gian = $xe_khach->thoi_gian()->create($arr);
            }
        }
        elseif($count_tgd < $count_tgv) {

            foreach ($input['thoi_gian']['thoi_gian_ve'] as $key => $tgv) 
            {
                if ( empty($input['thoi_gian']['thoi_gian_di'][$key]) ) {
                    $tgd = null;
                }
                else 
                $tgd = $input['thoi_gian']['thoi_gian_di'][$key];

                $arr = [
                    'thoi_gian_di' => $tgd,
                    'thoi_gian_ve' => $tgv
                ];
                $thoi_gian = $xe_khach->thoi_gian()->create($arr);
            }
        }
        if (!$xe_khach || !$thoi_gian) {
            DB::rollback();
        }
        DB::commmit();
        
        $this->model->create($input['xe']);
    }
    
}
