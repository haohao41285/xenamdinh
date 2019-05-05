<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TransportRepository;
use App\Models\Vehicle;
use App\Validators\TransportValidator;
use App\Traits\UploadPhotoTrait;

/**
 * Class TransportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TransportRepositoryEloquent extends BaseRepository implements TransportRepository
{
    use UploadPhotoTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vehicle::class;
        
    }

    public function database($input){

        $transport_list = $this->model->select('*');

        if($input['transport_cate_id']!=""){

             $transport_list = $transport_list->where('transport_route_id',$input['transport_cate_id']);
        }
        if($input['transport_route_id']!=""){

            $transport_list = $transport_list->where('transport_route_id',$input['transport_route_id']);
        }
        if($input['transport_active']!=""){

            $transport_list = $transport_list->where('transport_active',$input['transport_active']);
        }
        if($input['transport_active']==""){

            $transport_list = $transport_list->where('transport_active',1);
        }

        return $transport_list;
    
    }
    public function find_transport($transport_slug,$route)
    {
        return $this->model->where('transport_slug',$transport_slug)
                           ->where('transport_route_id',$route)
                           ->first();
        
    }
    public function store(array $input){

        $transport_slug = changeTitle($input['transport_name']);

        $input['transport_slug'] = $transport_slug;

        if(isset($input['transport_image'])){

            $input['transport_image'] = $this->uploadPhoto($input['transport_image'],$input['transport_name'],$input['transport_route_id']);

        }else{

            $input['transport_image'] = $input['transport_image_old'];
        }
        $input['transport_time_go'] = implode(",", $input['transport_time_go']);

        $input['transport_time_back'] = implode(",", $input['transport_time_back']);

        $input['transport_note'] = implode(",", $input['transport_note']);
        $transport_address = [];

        $transport_address = [
            'province' => $input['transport_province'],
            'district' => $input['transport_district'],
            'ward' => $input['transport_ward'],
            'detail' => $input['transport_detail'],
        ];
        $input['transport_address'] = json_encode($transport_address);
        

        if($input['transport_id'] == 0){

            $count = $this->find_transport($transport_slug,$input['transport_route_id']);
            //return $count;

            if(!isset($count)){

                $this->model->create($input);
                $message = 1;

            }else{
                $message = 0;
            }
        }else{
            $count = $this->model->where('transport_slug',$transport_slug)
                        ->where('transport_route_id',$input['transport_route_id'])
                        ->where('id','!=',$input['transport_id'])
                        ->first();

            if($count == 0){

                $this->model->find($input['transport_id'])->update($input);

                $message = 2;

            }else{

                $message = 3;
            }
        }
        return $message;
    }
    public function remove($id,$active){

        if($active == 1){

        $this->model->find($id)->update(['transport_active'=>0]);

        }else

        $this->model->find($id)->update(['transport_active'=>1]);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
