<?php

namespace App\Http\Middleware;

use Closure;

class HomesMiddleware
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
        $user = session('user');
        if ($user) {

            return $next($request);
        }else{

            return redirect('/home/login');
        }
    }
}
