<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table="tin_tucs";
    protected $fillable=[
    	'ava',
    	'tieu_de',
    	'noi_dung',
    	'nguon',
    	'list',
    	'element',
    	'source'
    ];
}
