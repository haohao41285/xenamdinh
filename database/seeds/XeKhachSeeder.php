<?php

use Illuminate\Database\Seeder;
use App\Models\XeKhach;

class XeKhachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XeKhach::truncate();
        for ($i=1; $i <5 ; $i++) { 
		    	$xe_khachs=[
		    	[
		    		'ava'=>'html/images/bus.jpg',
		    	    'ten_xe'=>"Hồng Ngọc{$i}",
		    	    'so_cho'=>16,
		    	    'dia_chi'=>'Nghĩa Hồng',
		    	    'lien_he_1'=>'123456789',
		    	    'id_tuyen'=>1
		    	],
		    	[
		    		'ava'=>'html/images/bus.jpg',
		    	    'ten_xe'=>"Thiên Ân{$i}",
		    	    'so_cho'=>45,
		    	    'dia_chi'=>'Nghĩa Phong',
		    	    'lien_he_1'=>'343342121',
		    	    'id_tuyen'=>2
		    	],
		    	[
		    		'ava'=>'html/images/bus.jpg',
		    	    'ten_xe'=>"Ngọc Hân{$i}",
		    	    'so_cho'=>45,
		    	    'dia_chi'=>'Nghĩa Hồng',
		    	    'lien_he_1'=>'123456789',
		    	    'lien_he_2'=>'999999999',
		    	    'id_tuyen'=>3
		    	]
		    ];
		    foreach ($xe_khachs as $xe_khach) {
		    	XeKhach::create($xe_khach);
		    }
		    	
		    
        }
        
    }
}
