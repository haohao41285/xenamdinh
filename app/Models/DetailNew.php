<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailNew extends Model
{
    protected $table="detail_news";
    protected $fillable=[
    	'ava',
    	'content',
    	'new_id'
    ];
}
