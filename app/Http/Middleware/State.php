<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class State
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
        $conf = DB::table('shop_conf')->first();
        if($conf->conf_state == 0){
            return redirect('/404/404');
        } else {
            return $next($request);
        }
    }
}
