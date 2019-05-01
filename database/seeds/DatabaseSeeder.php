<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
         //$this->call(PageSeeder::class);
        //$this->call(MenuSeeder::class);
    	//$this->call(MenuItemSeeder::class);
        //$this->call(XeKhachSeeder::class);
        //$this->call(TaxiSeeder::class);
        //$this->call(XeTaiSeeder::class);
        //$this->call(TuyenSeeder::class);
        //$this->call(ThoiGianSeeder::class);
        //$this->call(TuyenDungSeeder::class);
        //$this->call(NewsPathSeeder::class);
        //$this->call(CustomerSeeder::class);
        $this->call(UserSeeder::class);

         DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
