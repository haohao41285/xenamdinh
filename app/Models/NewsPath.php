<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsPath extends Model
{
    protected $table="news_paths";
    protected $fillable=[
    	'source',
    	'main_path',
    	'detail_path',
    	'list',
    	'content',
    	'ava_element',
    	'href_element',
    	'title_element',
    	'description_element',
    	'active'
    ];
}
