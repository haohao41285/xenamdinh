<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\CustomerPresenter;

class CustomerInfo extends Model
{
	protected $present = "App\\Presenters\\CustomerPresenter";
    protected $table="customer_infos";
    protected $fillable=[
    	'last_name',
    	'customer_id',
    	'first_name',
    	'gender'
    ];
    public function getPresenter()
    {
        return new CustomerPresenter($this);
    }
}
