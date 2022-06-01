<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminloggedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('Loggedadmin') && ( url('/admin') == $request->url() || url('/admin/register') == $request->url())){
            return back();
        }
        return $next($request);
    }
}
