<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table= "weathers";
    protected $fillable = [
    	'date_time',
    	'weather_detail'
    ];
    public $timestamps = false;
}
