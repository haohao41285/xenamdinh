<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TicketRepository;
use App\Models\Ticket;
use App\Validators\TicketValidator;
use App\Models\XeKhach;
use DB;
use Cart;


/**
 * Class TicketRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TicketRepositoryEloquent extends BaseRepository implements TicketRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ticket::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function store($input)
    {
        DB::beginTransaction();
        $input['total'] = str_replace('.00','',str_replace(',','',Cart::total()));

        $ticket = $this->model->create($input);

        foreach (Cart::content() as $cart) {
            
            $tuyens = XeKhach::find($cart->id);
            
            $tuyen_id = $tuyens->tuyens->id;

            $arr = [
                'car_id' => $cart->id,
                'route_id' =>$tuyen_id,
                'qty' => $cart->qty
            ];
            $ticket_details = $ticket->ticket_details()->create($arr);
        }
        if(!$ticket || !$ticket_details){
            DB::rollback();
        }
        DB::commit();
    }
}
