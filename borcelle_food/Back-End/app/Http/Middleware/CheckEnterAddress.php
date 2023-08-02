<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CheckEnterAddress
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
        if (Auth::check() && Auth::user()->role_id === 1) {
            if ($request->permanent_address && $request->permanent_address != "") {
                return $next($request);
            } else {
                return response()->json(['permanent_address' => 'vui lòng thêm địa chỉ thường trú'], 400);
            }
        } else {
            return $next($request);
        }
    }
}
