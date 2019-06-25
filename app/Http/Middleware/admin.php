<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class admin
{
     protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->auth=Session::get('role');
        // dd($this->auth);
        $role=['admin','receptionist','manager','trainer'];
        if (!in_array($this->auth, $role)) {
            // return abort(403, "No access here, sorry!");
            return redirect('adminloginpage');
        }

        return $next($request);
    }
}