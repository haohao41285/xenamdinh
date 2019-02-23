<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuyen extends Model
{
    protected $table="tuyens";

    protected $fillable=[
    	'ten_tuyen',
    	'slug'
    ];
    public $timestamps=false;
}
