<?php

namespace Fuerteventura2000\Http\Middleware;

use Closure;
use Fuerteventura2000\Admin;
use Illuminate\Support\Facades\Redirect;

class ValidateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userCookie = htmlspecialchars($request->cookie('user'));
        $sessionCookie = htmlspecialchars($request->cookie('sessionToken'));

        if($userCookie && $sessionCookie){
            $admin = Admin::where('email', $userCookie)->where('session_token', $sessionCookie)->first();

            $request['admin'] = $admin;

            if($admin) return $next($request);
        }
        return Redirect::to('admin');
    }
}
