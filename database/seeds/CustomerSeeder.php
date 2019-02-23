<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\CustomerInfo;
use Carbon\Carbon;
use App\Helper\helper;
use Illuminate\Http\Request;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();
        CustomerInfo::truncate();

        $customer = Customer::create([
            'email' => 'email_test@xe.com',
            'password' => 'test12345',
            'last_logon' => Carbon::now(),
            'active' => 1,
            'active_code' => uniqid(),
            'customer_ip'=>\Request::getClientIp()
        ]);
        $customer->customer_info()->create([
            'display_name' => 'Nguyễn Văn Thiệu',
            'first_name' => 'Thiệu',
            'last_name' => 'Nguyễn Văn',
            'gender' => 1,
        ]);

        for ($i=0; $i <11; $i++) 
        { 
        	$customer = Customer::create([
                'email' => "email_test{$i}@xe.com",
                'password' => "test12345{$i}",
                'last_logon' => Carbon::now(),
                'active' => 1,
                'active_code' => uniqid(),
                'customer_ip'=>\Request::getClientIp()
            ]);
            $customer->customer_info()->create([
                'display_name' => "Nguyễn Văn Thiệu{$i}",
                'first_name' => "Thiệu{$i}",
                'last_name' => 'Nguyễn Văn',
                'gender' => 1,
            ]);
        }
    }
}
