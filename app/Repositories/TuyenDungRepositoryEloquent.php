<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TuyenDungRepository;
use App\Models\TuyenDung;
use App\Validators\TuyenDungValidator;
use App\Traits\UploadPhotoTrait;
use App\Traits\DeletePhotoTrait;

use DB;

/**
 * Class TuyenDungRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TuyenDungRepositoryEloquent extends BaseRepository implements TuyenDungRepository
{
    use UploadPhotoTrait;
    use DeletePhotoTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TuyenDung::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function latest($amount)
    {
        return $this->orderBy('created_at','desc')->paginate($amount);
    }
    public function update(array $input,$id)
    {

        if (isset($input['ava']) ) {

            $input['ava'] = $this->uploadPhoto($input['ava'],$input['cong_ty'],"work");
        }

        $input['customer_id'] = \Auth::guard('customer')->user()->id;

        $model = $this->model->find($id)->update($input);

        return true;
    }
    public function delete($id)
    {
        $model = $this->model->find($id);

        $image_path = $model->ava;

        $this->deletePhoto($image_path);

        $model->delete();
    }
}
