<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XeKhach extends Model
{
    protected $table="xe_khachs";
    protected $fillable=[
    	'ava',
    	'ten_xe',
    	'so_cho',
    	'tinh',
        'huyen',
        'xa',
    	'lien_he_1',
        'lien_he_2',
    	'id_tuyen',
        'customer_id'
    ];
    public function thoigians(){
    	return $this->hasMany(ThoiGian::class,'xe_id','id');
    }
    public function tuyens(){
    	return $this->belongsTo(Tuyen::class,'tuyen_id','id');
    }
    public function thoi_gian()
    {
        return $this->hasOne(ThoiGian::class, 'xe_id');
    }
}
