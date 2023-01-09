<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Auth;

class PhanQuyenMidlleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if(Auth::check()){
    //         $User=NguoiDung::find(Auth::user()->id);
    //         if($User->chucvu=='Admin')
    //         {

    //         }
    //     }
    //     return $next($request);
    // }
}
