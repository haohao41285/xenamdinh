<?php

namespace App\Models;

use App\Models\BaseModel;

class Source extends BaseModel
{
    protected $table = "sources";

    public static function boot(){
    	parent::boot();
    }
    public $fillable = [
    	'source',
    	'source_path',
    	'img_element',
    	'title_element',
    	'detail_path',
    	'description_element',
    	'href_element',
    	'status',
    	'created_by',
    	'updated_by'
    ];
}
