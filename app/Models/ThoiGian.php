<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThoiGian extends Model
{
    protected $table="thoi_gians";

    protected $fillable=[
    	'id_xe',
    	'thoi_gian_di',
    	'thoi_gian_ve'
    ];
    public $timestamps=false;
}
