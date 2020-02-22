<?php
/*
 * @Descripttion: 后台登录的中间件业务
 * @Author: House
 * @Date: 2020-02-22 11:22:54
 * @LastEditors: House
 * @LastEditTime: 2020-02-22 11:24:07
 */

namespace app\admin\middleware;


class Auth 
{
    
    public function handle($request, \Closure $next)
    {
        //利用前置中间件判断用户是否登录
        if(empty(session(config('admin.admin_user'))) && !preg_match('/login/',$request->pathinfo())){
            return redirect(url('/admin/login/index'));
        }
        return $next($request);
    }
}