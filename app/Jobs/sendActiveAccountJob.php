<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class sendActiveAccountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $customer_info;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer_info,$email)
    {
        $this->customer_info = $customer_info;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $e = new sendActiveAccountEmail();
        Mail::to($this->email)->send($e)->with([
            'last_name' => $this->customer_info['last_name'],
            'first_name' => $this->customer_info['first_name'],
        ]);
       
       
    }
}
