<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
    protected $table = "ticket_details";

    protected $fillable = [
    	'route_id',
    	'car_id',
    	'qty',
    	'ticket_id'
    ];

    public $timestamps = false;

    public function ticket()
    {
    	return $this->belongsTo(Ticket::class,'ticket_id','id');
    }
}
