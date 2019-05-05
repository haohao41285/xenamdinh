<?php

namespace App\Models;

use App\Models\BaseModel;

class NewsCate extends BaseModel
{
    protected $table = "news_cates";

    public $fillable = [
    	'cate_news_name',
    	'cate_news_slug',
    	'created_by',
    	'updated_by',
    	'cate_news_active',
    ];
    public $timestamps = true;

    public static function boot(){
    	parent::boot();
    }
    public function users(){
    	return $this->belongsTo(User::class,'updated_by','id');
    }
}
