<?php

namespace App\Http\Middleware;

use Closure;

class checkAuthorityAdminApi
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
            return response(['message' => 'Bạn chưa đủ tuổi à nhầm đủ quyền :>'], 400);
        }
    }
}
