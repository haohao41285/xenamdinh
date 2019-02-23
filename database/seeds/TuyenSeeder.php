<?php

use Illuminate\Database\Seeder;
use App\Models\Tuyen;

class TuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tuyen::truncate();

        $tuyens=[
        	[
        		'ten_tuyen'=>'Hà Nội',
        		'slug'=>'ha-noi',
        	],
        	[
        		'ten_tuyen'=>'Dak Nông',
        		'slug'=>'dak-nong',
        	],
        	[
        		'ten_tuyen'=>'Sài Gòn',
        		'slug'=>'sai-gon',
        	]
        ];
        foreach($tuyens as $tuyen)
        {
        	Tuyen::create($tuyen);
        }
    }
}
