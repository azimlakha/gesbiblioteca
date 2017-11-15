<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckProfile
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
        $user_id = Auth::user()->id;
        $profile = DB::table('profiles')->where('user_id', '=', $user_id)->first();
        if (($profile->profile != 'Bibliotecario') & ($profile->profile != 'Superuser')) {
            return redirect('errors/permition');
        }

return $next($request);
    }
}
