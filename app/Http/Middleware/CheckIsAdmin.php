<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckIsAdmin
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

        if (auth()->user()->is_admin == 0) {
            Session::flash('status', 'Vous devez être administrateur');
            Session::flash('type', 'alert-danger');
            return redirect()->route('articles');
        }
        return $next($request);
    }
}
