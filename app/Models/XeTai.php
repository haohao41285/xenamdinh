<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XeTai extends Model
{
    protected $table="xe_tais";
    
    protected $fillable=[
    	'ten_xe',
    	'ava',
    	'so_cho',
    	'tai_trong',
    	'tinh',
        'huyen',
        'xa',
    	'lien_he_1',
    	'lien_he_2',
        'customer_id',
    ];
}
