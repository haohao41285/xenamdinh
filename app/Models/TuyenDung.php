<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuyenDung extends Model
{
    protected $table="tuyen_dungs";
    protected $fillable=[
    	'ava',
    	'cong_ty',
    	'mo_ta',
    	'customer_id',
    	'dia_chi'
    ];
    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
