<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
    	'customer_id',
    	'provider_customer_id',
    	'provider'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
