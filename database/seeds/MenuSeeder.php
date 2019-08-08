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
        Menu::truncate();
        $arr_menu = ['Trang chủ','Tin tức','Xe','Liên hệ','Đăng kí','Đăng nhập'];
        $arr_tintuc = ['Xe cộ','Xã hội'];
        $arr_xe = ['Xe Khách','Taxi'];
        for ($i=0; $i < 6; $i++) { 
            $arr = [
                'title' => $arr_menu[$i],
                'slug' => changeTitle($arr_menu[$i]),
                'href' => changeTitle($arr_menu[$i]),
                'parent_id' => 0,
                'position' => $i,
                'status' => 1,
            ];
            Menu::create($arr);
            if( $i == 1){
                for ($j=0; $j < 2; $j++) { 
                    $arr_son = [
                        'title' => $arr_tintuc[$j],
                        'slug' => changeTitle($arr_tintuc[$j]),
                        'href' => changeTitle($arr_tintuc[$j]),
                        'parent_id' => $i,
                        'position' => $j,
                        'status' => 1,
                    ];
                    Menu::create($arr_son);
                }
            }
            if( $i == 2){
                for ($j=0; $j < 2; $j++) { 
                    $arr_son = [
                        'title' => $arr_xe[$j],
                        'slug' => changeTitle($arr_xe[$j]),
                        'href' => changeTitle($arr_xe[$j]),
                        'parent_id' => $i,
                        'position' => $j,
                        'status' => 1,
                    ];
                    Menu::create($arr_son);
                }
                
            }
        }
        
    }
}
