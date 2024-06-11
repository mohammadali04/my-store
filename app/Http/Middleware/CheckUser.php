<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Route;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin_info_parameter=Route::current()->parameter('admin_info');
        $user_from_parameter=$admin_info_parameter->user()->first()->id;
        $user_id=auth()->user()->id;
        if($user_id==$user_from_parameter){
            return $next($request);
        }else{
            $msg='دسترسی به این لینک برای شما مقدور نیست';
            return redirect(Route('admin.index'))->with('warning',$msg);
        }
        
    }
}
