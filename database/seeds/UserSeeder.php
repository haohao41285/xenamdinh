<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $arr = [
        	'name' => 'thieusumo',
        	'email' => 'nguyenthieupro93@gmail.com',
        	'password'=>'111111',
        	'last_logon' => now(),
        	'active_code' =>uniqid(),
        	'active' => 1,

        ];
        User::create($arr);
    }
}
