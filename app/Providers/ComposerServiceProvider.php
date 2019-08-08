<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Tuyen;
use App\Models\Menu;
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
        view()->composer('*', function($view) {
            $province_json = file_get_contents("provinces.json");
            $arr['composer_province'] = json_decode($province_json,true);
            $district_json = file_get_contents("districts.json");
            $arr['composer_district'] = json_decode($district_json,true);
            $ward_json = file_get_contents("wards.json");
            $arr['composer_ward'] = json_decode($ward_json,true);
            $view->with($arr);
        });
        //Tuyến xe
        // view()->composer('*', function($view) {
        //     $composer_tuyen = Tuyen::all();
        //     $view->with('composer_tuyen',$composer_tuyen);
        // });
        //Auth
        view()->composer('*', function($view) {
          $composer_customer =(\Auth::guard('customer')->check()) ?\Auth::guard('customer')->user():null;
             $view->with('composer_customer',$composer_customer);
        });
        view()->composer('admin.*', function($view) {
          $composer_user =\Auth::user()?\Auth::user():null;
             $view->with('composer_user',$composer_user);
        });
        //MENU
        view()->composer('*',function($view)
        {
            $menu_list = Menu::where('status',1)->get();
            $composer_menu = collect($menu_list);
            $view->with('composer_menu',$composer_menu);
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