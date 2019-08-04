<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\BaseModel;

class CateVehicle extends Model
{
    protected $table = "cate_vehicles";

    protected $fillable = [
    	'cate_transport_name',
    	'cate_transport_slug',
    	'created_by',
    	'updated_by',
    	'cate_transport_active'
    ];
    public $timestamps = true;

    // public static function boot(){
    // 	parent::boot();
    // }
}
