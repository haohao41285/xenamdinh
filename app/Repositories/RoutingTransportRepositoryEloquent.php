<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoutingTransportRepository;
use App\Models\Route;
use App\Validators\RoutingTransportValidator;
use App\Traits\UploadPhotoTrait;

/**
 * Class RoutingTransportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RoutingTransportRepositoryEloquent extends BaseRepository implements RoutingTransportRepository
{
    use UploadPhotoTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Route::class;
    }
    public function store($input){

        if(isset($input['route_image'])){

            $input['route_image'] = $this->uploadPhoto($input['route_image'],$input['route_name'],"routing");

        }$input['route_image'] = "no image";

        $this->create($input);
    }
    public function checkRouteName($input,$id){

        if($id == 0){

            return $this->model->select('id')->where('route_slug',$input)->count();
        }
        else
            return $this->model->select('id')->where('id','!=',$id)
                                             ->where('route_slug',$input)
                                             ->count();
    }
    public function getRoute($slug){

        return $this->model->where('route_slug',$slug)->first();
    }
    public function datatable($input){

        $route_list = $this->model->select('*');

        if($input['route_active'] != ""){

            $route_list = $route_list->where('route_active',$input['route_active']);
        }else
            $route_list = $route_list->where('route_active',1);
        
        return $route_list;
    }
    public function update(array $input,$id){

        if(isset($input['route_image_hidden']))

            $input['route_image'] = $input['route_image_hidden'];
        
        elseif(isset($input['route_image'])){

            $input['route_image'] = $this->uploadPhoto($input['route_image'],$input['route_name'],"routing");
        }else

        $input['route_image'] = "bus.jpg";

        return $this->model->find($id)->update($input);

    }
    public function remove($id,$active){

        if($active == 1)

            $this->model->where('id',$id)->update(['route_active'=>0]);
        else
            $this->model->where('id',$id)->update(['route_active'=>1]);
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
