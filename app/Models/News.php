<?php

namespace App\Models;

use App\Models\BaseModel;

class News extends BaseModel
{
    public static function boot(){
    	parent::boot();
    }
    protected $table = "news";
    public $fillable = [
    	'title',
    	'content',
    	'image',
    	'href',
    	'source',
    	'created_by',
    	'updated_by',
    	'status',
    	'news_cate',
        'first_news'
    ];
    public function cate(){
        return $this->belongsTo(NewsCate::class,'news_cate','id');
    }
}
