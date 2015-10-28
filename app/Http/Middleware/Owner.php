<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class Owner
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
        $id = $request->route()->getParameter('users');
        if($id != Auth::user()->id )  return Redirect::to('users');
        return $next($request);
    }
}
