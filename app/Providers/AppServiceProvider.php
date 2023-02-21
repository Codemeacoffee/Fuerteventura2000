<?php

namespace Fuerteventura2000\Providers;

use Fuerteventura2000\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        if($request->cookie('user') && $request->cookie('user')){
            $userCookie = decrypt(htmlspecialchars($request->cookie('user')), false);
            $sessionCookie = decrypt(htmlspecialchars($request->cookie('sessionToken')), false);

            if(!$userCookie || !$sessionCookie){
                return;
            }else{
                $admin = Admin::where('email', $userCookie)->first();

                if(!$admin) return;
                else{
                    if($admin->session_token != $sessionCookie) return;
                    else View::share('isAdmin', true);
                }
            }
        }
    }
}
