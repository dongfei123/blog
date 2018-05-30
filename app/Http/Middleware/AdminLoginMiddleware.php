<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        //检测当前用户是否登录（session）
        if($request->session()->has('id')){

           return $next($request); 
        }else{

            //跳转登录界面
            return redirect('/admin/login');
        }
        
    }
}
