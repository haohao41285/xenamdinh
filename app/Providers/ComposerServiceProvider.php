<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tuyen;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        //Address
        view()->composer(['themes.*','tuyen_dung.*'], function($view) {
            $province_json = file_get_contents("provinces.json");
            $arr['composer_province'] = json_decode($province_json,true);

            $district_json = file_get_contents("districts.json");
            $arr['composer_district'] = json_decode($district_json,true);

            $ward_json = file_get_contents("wards.json");
            $arr['composer_ward'] = json_decode($ward_json,true);
            $view->with($arr);
        });

        //Tuyến xe
        view()->composer('*', function($view) {
            $composer_tuyen = Tuyen::all();
            $view->with('composer_tuyen',$composer_tuyen);
        });

        //Auth
        view()->composer('*', function($view) {
          $composer_customer =(\Auth::guard('customer')->check()) ?\Auth::guard('customer')->user():null;
             $view->with('composer_customer',$composer_customer);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
