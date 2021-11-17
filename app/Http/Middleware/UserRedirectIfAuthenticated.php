<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {

        if (Auth::check()){
            $expireTime= Carbon::now()->addSecond(30);

            Cache::put('User_is_Online'. Auth::user()->id, true, $expireTime);
            $user = User::where('id', Auth::user()->id)->update([
                'last_seen' =>Carbon::now()
            ]);


        }
//        check if user is logged in
        if (Auth::check() && Auth::user()) {
            return $next($request);

        }else{
            return  redirect()->route('login');
        }


    }
}
