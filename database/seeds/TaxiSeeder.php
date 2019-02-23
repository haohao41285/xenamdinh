<?php

use Illuminate\Database\Seeder;
use App\Models\Taxi;

class TaxiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taxi::truncate();
        for ($i=1; $i <11; $i++) { 
        	$taxis=[
	        	[
	        		'ten_xe'=>"Minh Vương{$i}",
	        		'ava'=>'html/images/taxi.png',
	        		'so_cho'=>'4',
	        		'dia_chi'=>'Nghĩa Hưng',
	        		'lien_he_1'=>'991292829'
	        	],
	        	[
	        		'ten_xe'=>"Nguyễn Thiệu{$i}",
	        		'ava'=>'html/images/taxi.png',
	        		'so_cho'=>'7',
	        		'dia_chi'=>'Nghĩa Lạc',
	        		'lien_he_1'=>'3442242311'
	        	],[
	        		'ten_xe'=>"Minh Tuệ{$i}",
	        		'ava'=>'html/images/taxi.png',
	        		'so_cho'=>'12',
	        		'dia_chi'=>'Rạng Đông',
	        		'lien_he_1'=>'553444323'
	        	],
        	];
        	foreach ($taxis as $taxi) {
        		Taxi::create($taxi);
        	}
        }
        
    }
}
