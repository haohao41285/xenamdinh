<?php

use Illuminate\Database\Seeder;
use App\Models\ThoiGian;

class ThoiGianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThoiGian::truncate();

       for ($i=4; $i < 25; $i+=4) { 
       	    $thoi_gians=[
       		    [
       			    'id_xe'=>1,
       			    'thoi_gian_di'=>$i,
       		    	'thoi_gian_ve'=>$i-1
       		    ],
       		    [
       			    'id_xe'=>2,
       			    'thoi_gian_di'=>$i+1,
       		    	'thoi_gian_ve'=>$i-1
       		    ],
       		    [
       			    'id_xe'=>3,
       			    'thoi_gian_di'=>$i+2,
       		    	'thoi_gian_ve'=>$i-1
       		    ],
       		    [
       			    'id_xe'=>4,
       			    'thoi_gian_di'=>$i+3,
       		    	'thoi_gian_ve'=>$i-2
       		    ],
       		    [
       			    'id_xe'=>5,
       			    'thoi_gian_di'=>$i+4,
       		    	'thoi_gian_ve'=>$i-4
       		    ],
       		    [
       			    'id_xe'=>6,
       			    'thoi_gian_di'=>$i+2,
       		    	'thoi_gian_ve'=>$i-2
       		    ],
       		    [
       			    'id_xe'=>7,
       			    'thoi_gian_di'=>$i-1,
       		    	'thoi_gian_ve'=>$i+2
       		    ],
       		    [
       			    'id_xe'=>8,
       			    'thoi_gian_di'=>$i-2,
       		    	'thoi_gian_ve'=>$i+3
       		    ],
       		    [
       			    'id_xe'=>9,
       			    'thoi_gian_di'=>$i,
       		    	'thoi_gian_ve'=>$i-1
       		    ],
       		    [
       			    'id_xe'=>10,
       			    'thoi_gian_di'=>$i-2,
       		    	'thoi_gian_ve'=>$i+4
       		    ],
       		    [
       			    'id_xe'=>11,
       			    'thoi_gian_di'=>$i,
       		    	'thoi_gian_ve'=>$i-1
       		    ],
       		    [
       			    'id_xe'=>12,
       			    'thoi_gian_di'=>$i,
       		    	'thoi_gian_ve'=>$i-2
       		    ],
       		
        	];
           	foreach ($thoi_gians as $thoi_gian) {
            	ThoiGian::create($thoi_gian);
            }
       }
        
    }
}
