<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    protected $table="taxis";
    
    protected $fillable=[
    	'ten_xe',
    	'so_cho',
        'ava',
    	'tinh',
    	'huyen',
    	'xa',
    	'lien_he_1',
    	'lien_he_2',
    	'customer_id'
    ];
}
