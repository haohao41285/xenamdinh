<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "tickets";

    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    	'address',
    	'note',
    	'total',
        '_token'
    ];

    public function ticket_details()
    {
    	return $this->hasMany(TicketDetail::class,'ticket_id','id');
    }
}
