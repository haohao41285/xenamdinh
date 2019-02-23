<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements Transformable
{

    use TransformableTrait; 

    protected $table = "customers";

    protected $guard = "customer";

    protected $fillable=[
    	'email',
    	'password',
    	'last_logon',
    	'active',
    	'customer_ip',
        'remember_token'
    ];
    protected $hidden=[
        'password',
        'remember_token'
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function customer_info()
    {
        return $this->hasOne(CustomerInfo::class, 'customer_id');
    }
    public function tuyen_dungs()
    {
        return $this->hasMany(TuyenDung::class, 'customer_id','id');
    }
    public function customer_news()
    {
        return $this->hasMany(CustomerNews::class,'customer_id');
    }
    
}
