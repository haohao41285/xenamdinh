<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Menu::truncate();

        $menus=[
        	[
        		"title"=>"Main",
        		"code"=>"main",
        	],
        	[
        		"title"=>"Footer",
        		"code"=>"footer",
        	]
        ];

        foreach($menus as $menu)
        {
        	$new_menu=array(
        		"title"=>$menu['title'],
        		"code"=>$menu['code'],
        	);
        	Menu::create($new_menu);
        }
    }
}
