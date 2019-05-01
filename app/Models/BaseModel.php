<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class BaseModel extends Model
{
    public static function boot(){
    	parent::boot();
    	static::creating(function($model){
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;

    	});
    	static::updating(function($model){
    		if(isset($model->updated_by)){
    			$model->updated_by = Auth::user()->id;
    		}
    	});
    }
}
