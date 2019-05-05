<?php

namespace App\Models;

use App\Models\BaseModel;

class Vehicle extends BaseModel
{
    protected $table = "vehicles";

    public $fillable = [
    	'transport_name',
    	'transport_image',
    	'transport_character',
    	'transport_route_id',
    	'transport_way',
    	'transport_phone',
    	'transport_phone_add',
    	'transport_note',
    	'transport_address',
    	'transport_cate_id',
    	'transport_time_go',
    	'transport_time_back',
    	'created_by',
    	'updated_by',
    	'transport_slug',
    	'transport_active'
    ];
    public static function boot(){

    	parent::boot();
    }
    public $timestamps = true;

    public function users(){

        return $this->belongsTo(User::class,'updated_by','id');
    }
    public function routes(){

        return $this->belongsTo(Route::class,'transport_route_id','id');
    }
}
