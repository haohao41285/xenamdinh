<?php

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::truncate();

        $menu_items=[
        	[
        		"menu_id"=> 1,
        		"page_id"=> 3,
        		"parent_id"=> 0,
        		"title"=> "Việc Làm",
        		"lft"=> 1,
        		"rgt"=> 2,
        		"depth"=> 1,
        		"position"=> 1,
        	],
        	[
        		"menu_id"=> 1,
        		"page_id"=> 2,
        		"parent_id"=> 0,
        		"title"=> "Tin Tức",
        		"lft"=> 1 ,
        		"rgt"=> 2,
        		"depth"=> 1,
        		"position"=> 0 ,
        	],
        	[
        		"menu_id"=> 1,
        		"page_id"=> null,
        		"parent_id"=> 0,
        		"title"=>"Xe",
        		"lft"=> 1,
        		"rgt"=> 8,
        		"depth"=> 1,
        		"position"=> 3,
        	],
        	[
        		"menu_id"=> 1,
        		"page_id"=>4,
        		"parent_id"=> 4,
        		"title"=> "Xe Khách",
        		"lft"=> 2,
        		"rgt"=> 3,
        		"depth"=> 2,
        		"position"=> 0,
        	],
        	[
        		"menu_id"=> 1,
        		"page_id"=> 5,
        		"parent_id"=> 4,
        		"title"=> "Xe Tải",
        		"lft"=> 4,
        		"rgt"=> 5,
        		"depth"=> 2,
        		"position"=> 1,
        	],
        	[
        		"menu_id"=>1,
        		"page_id"=>6,
        		"parent_id"=>4,
        		"title"=>"Taxi",
        		"lft"=> 6,
        		"rgt"=> 7,
        		"depth"=> 2,
        		"position"=> 2,
        	],
            [
                "menu_id"=>2,
                "page_id"=>7,
                "parent_id"=>0,
                "title"=>"Liên Hệ",
                "lft"=> 1,
                "rgt"=> 2,
                "depth"=> 1,
                "position"=> 1,
            ]
        ];
        foreach ($menu_items as $menu_item) {
        	MenuItem::create($menu_item);
        }
    }
}
