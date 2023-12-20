<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // dd('fdf');
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if($user->hasRole('admin')){
                return redirect('/admin');
            }else{
                return redirect('/home');
            }
        }
    
        return $next($request);
    }
    
}
