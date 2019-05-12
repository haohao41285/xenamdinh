<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerRepository;
use App\Models\Customer;
use App\Validators\CustomerValidator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Auth;

/**
 * Class CustomerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function checkEmail($email)
    {
        $customer_id = $this->model->select('id')->where('email',$email)->get();

        return count($customer_id);
    }
    public function store(array $input)
    {
        DB::beginTransaction();

        //$input['customer']['remember_token']=$input['_token'];

        $input['customer']['active'] = getUserNoActive();
        $input['customer']['last_logon'] = now();

        if(!isset($input['customer']['password']))
        {
            unset($input['customer']['password']);
        }

        $customer = $this->model->create($input['customer']);

        $customer_info = $customer->customer_info()->create($input['customer_info']);

        if(!$customer || !$customer_info)
        {
            DB::rollback();
            return false;
        }
        Log::info("111-Người Dùng Mới: ".$input['customer_info']['customer_lastname']." ".$input['customer_info']['customer_firstname']);

        DB::commit();

        return $customer;
    }
    public function getCustomerInfo($email)
    {
        $customer = $this->model->where('email',$email)->first();

        $customer_info = $customer->customer_info()->first();

        return $customer_info;
    }
    public function getInfor($id)
    {
        $infors['customer'] = $this->model->find($id);

        $works = $infors['customer']->tuyen_dungs()->orderBy('created_at','desc')->get();
        
        if(isset($works)){

            $infors['works'] = $works;
        }
        $customer_infor =$infors['customer']->customer_info()->first();

        if(isset($customer_infor)){
            
            $infors['customer_infor'] = $customer_infor;
        }
        return $infors;
    }
}
