<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerNews extends Model
{
    protected $table = "customer_news";

    protected $fillable = [
    	'customer_id',
    	'content',
    	'file',
        'parent_id'
    ];
    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id');
    }
}
