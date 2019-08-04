<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CateVehicle;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cate_id = CateVehicle::max('id')+1;
        $arr = [
            'id' => $cate_id,
            'cate_transport_name' => 'Xe lu',
            'cate_transport_slug' => 'xe-lu',
            'created_by' => 1,
            'updated_by' => 1,
            'cate_transport_active' => 1,
        ];
        CateVehicle::create($arr);
        $this->info('Demo:Cronjob Comand Run Successfully!');
    }
}
