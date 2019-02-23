<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\Models\Customer;
use DB;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderCustomerId($providerUser->getId())
            ->first();

        if ($account) {

            $customer = Customer::whereId($account->customer_id)->first();

            return $customer;

        } else {

         DB::beginTransaction();

            $email = $providerUser->getEmail() ?? $providerUser->getNickname();

            $account = new SocialAccount([

                'provider_customer_id' => $providerUser->getId(),

                'provider' => $social
            ]);

            $customer_arr = Customer::whereEmail($email)->first();

            if (!$customer_arr) {
               

                $customer_arr = Customer::create([

                    'email' => $email,

                    'name' => $providerUser->getName(),

                    'password' => $providerUser->getName(),

                    'remember_token' => $providerUser->token,

                    'customer_ip' => \Request::ip(),
                ]);

                if ($social =='facebook') {

                    $info_arr = [

                    'first_name' => $providerUser->user['first_name'],

                    'last_name' => $providerUser->user['last_name']

                    ];
                }elseif ($social == 'google') {

                    $info_arr = [

                    'first_name' => $providerUser->user['given_name'],

                    'last_name' => $providerUser->user['family_name']

                    ];
                }
                
                $customer_info = Customer::whereEmail($email)->first();

                $customer_info_save = $customer_info->customer_info()->create($info_arr);

                if (!$customer_info_save) {

                    DB::rollback();
                }
            }

            $account->customer()->associate($customer_arr);

            $account->save();

            DB::commit();

            return $customer_arr;
        }
    }
}
