<?php

use Illuminate\Database\Seeder;
use App\Models\TuyenDung;

class TuyenDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TuyenDung::truncate();

        for ($i=1; $i < 6; $i++) { 
        	    $tins=[
        	    [
        	    	'cong_ty'=>"TNHH May Sông Hồng {$i}",
                    'title' => changeTitle("Tuyển dụng nhân viên thời vụ{$i}"),
        	    	'mo_ta'=>'Tuyển công nhân may lành nghề, lương cao...',
        	    	'dia_chi'=>'Thị Trấn Liễu Đề',
        	    	'customer_id'=>$i,
                    'ava'=>'html/images/company.jpg'
         	    ],
            	[
        	    	'cong_ty'=>"TNHH Đá Quỹ Nhất {$i}",
                    'title' => changeTitle("Tuyển dụng nhân viên lành nghề{$i}"),
        	    	'mo_ta'=>'Tuyển công nhân may lành nghề, lương cao...',
        	    	'dia_chi'=>'Thị Trấn Quỹ Nhất',
        	    	'customer_id'=>$i,
                    'ava'=>'html/images/company.jpg'
        	    ]
            ];
            foreach ($tins as $tin) {
            	TuyenDung::create($tin);
            }
        }
        
    }
}
