<?php

use Illuminate\Database\Seeder;
use App\Models\XeTai;

class XeTaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XeTai::truncate();

        for ($i=1; $i <11; $i++) { 
	        	$xes=[
	        	[
	        		'ten_xe'=>"Hoàng Long{$i}",
	        		'ava'=>'html/images/truck.png',
	        		'tai_trong'=>2,
	        		'dia_chi'=>"Nông Trường{$i}",
	        		'lien_he_1'=>'3534232323',
	        	],
	        	[
	        		'ten_xe'=>"Hoàng Long{$i}",
	        		'ava'=>'html/images/truck.png',
	        		'tai_trong'=>2,
	        		'dia_chi'=>"Bình Hải{$i}",
	        		'lien_he_1'=>'3534232323',
	        	],
	        	[
	        		'ten_xe'=>"Hoàng Long{$i}",
	        		'ava'=>'html/images/truck.png',
	        		'tai_trong'=>10,
	        		'dia_chi'=>"Nông Trường{$i}",
	        		'lien_he_1'=>'3534232323',
	        		'lien_he_2'=>'4223242342'
	        	]
	        ];
	        foreach ($xes as $xe) {
	        	XeTai::create($xe);
	        }
        }

        
    }
}
