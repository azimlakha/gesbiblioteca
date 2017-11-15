<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user_id = Auth::user()->id;
            $profile = DB::table('profiles')->where('user_id', '=', $user_id)->first();
            if (($profile->profile == 'Superuser') OR ($profile->profile == 'Bibliotecario')){
                return redirect('/');
            }else{
                return redirect()->intended('/homepage');
            }
        }
        return $next($request);
    }
}
