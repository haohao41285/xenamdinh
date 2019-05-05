<?php

namespace App\Models;

use App\Models\BaseModel;

class CateVehicle extends BaseModel
{
    protected $table = "cate_vehicles";

    protected $fillable = [
    	'cate_vehicle_name',
    	'cate_vehicle_slug',
    	'created_by',
    	'updated_by',
    	'cate_vehicle_active'
    ];
    public $timestamps = true;

    public static function boot(){
    	parent::boot();
    }
}
