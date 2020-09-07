<?php

namespace App\Http\Middleware;

use Closure;

class CheckQuanLy
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
        if ($request->session()->has('id') && session('kind') == 0) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
