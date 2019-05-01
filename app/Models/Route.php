<?php

namespace App\Models;

use App\Models\BaseModel;

class Route extends BaseModel
{
    protected $table = 'routes';
    
    public static function boot(){
    	parent::boot();
    }

    public $fillable = [
    	'route_name',
    	'route_slug',
    	'route_image',
    	'created_by',
    	'updated_by'
    ];
    public $timestamps = true;

    public function users(){
        
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
