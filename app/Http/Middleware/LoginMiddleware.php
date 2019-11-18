<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->isUser() || $user->isQLThon() || $user->isQLXa() ||$user->isQuanTri() ||$user->isLanhDaoTinh() ||$user->isLanhDaoHuyen())
                return $next($request);
            else
                return redirect('/');   
        }
        else
            return redirect('/');
    }
}
