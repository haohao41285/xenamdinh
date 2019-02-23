<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        $pages=[
            [
                'code'=>'HOME',
                'theme'=>'home',
                'active'=>1,
                'slug'=>'/'
            ],
        	[
        		'code'=>'TIN-TUC',
        		'theme'=>'tin_tuc',
                'active'=>1,
                'slug'=>'tin-tuc'
        	],
        	[
        		'code'=>'VIEC-LAM',
        		'theme'=>'viec_lam',
                'active'=>1,
                'slug'=>'viec-lam'
        	],
        	[
        		'code'=>'XE-KHACH',
        		'theme'=>'xe_khach',
                'active'=>1,
                'slug'=>'xe-khach'
        	],
        	[
        		'code'=>'XE-TAI',
        		'theme'=>'xe_tai',
                'active'=>1,
                'slug'=>'xe-tai'
        	],
        	[
        		'code'=>'TAXI',
        		'theme'=>'taxi',
                'active'=>1,
                'slug'=>'taxi'
        	],
            [
                'code'=>'LIEN-HE',
                'theme'=>'lien_he',
                'active'=>1,
                'slug'=>'lien-he'
            ]
        ];
        foreach ($pages as $key => $page) {
        	// $new_page=array(
        	// 	'code'=>$page['code'],
        	// 	'theme'=>$page['theme'],
         //        'active'=>$page['active'],
        	// );
        $file=resource_path('views/themes/'.$page['theme'].'.blade.php');
        if(!is_file($file))
        	file_put_contents($file,'');
        Page::create($page);
        }

    }
}
