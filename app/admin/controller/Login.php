<?php
/*
 * @Descripttion: 登录模块
 * @Author: House
 * @Date: 2020-02-22 11:19:26
 * @LastEditors: House
 * @LastEditTime: 2020-02-22 11:25:39
 */
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Session;

class Login extends BaseController{


    public function index(){
        
        return View::fetch();
    }

    /**
     * @Descripttion: 登陆请求
     * @param {type} 
     * @return: 
     * @Author: House
     * @Date: 2020-02-22 11:20:37
     */
    public function check(){
        //请求方式校验  
        if(!$this->request->isPost()){
            return show(config('status.error'),'请求方式错误！');
        }
        //参数校验
        $username = $this->request->param('username','','trim');
        $password = $this->request->param('password','','trim');
        $captcha = $this->request->param('captcha','','trim');

        $data = [
            'username' => $username,
            'password' => $password,
            'captcha' => $captcha
        ];

        $valdate = new \app\admin\validate\AdminUser;
        if(!$valdate->check($data)){
            return show(config('status.error'),$valdate->getError());
        }
        try {
            $result = \app\admin\business\AdminUser::login($data);
        } catch (\Throwable $e) {
            return show(config('status.error'),$e->getMessage());
        }
        return show(config('status.success'),'登陆成功！');
    }


    /**
      * @Descripttion: 推出登录
      * @param {type} 
      * @return: 
      * @Author: House
      * @Date: 2020-02-22 11:21:27
      */
     public function loginOut()
    {
        Session::delete(config('admin.admin_user'));
        return redirect(url('/admin/login/index'));
    }

   
   
}