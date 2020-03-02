<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-02-27 15:41:47
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 21:00:55
 */

declare(strict_types=1);
namespace app\api\controller;

use app\BaseController;

class Login extends BaseController{

    public function index() : object
    {
     $phoneNumber = $this->request->param('phone_number','','trim');
     $code = input('param.code','','trim');
     $type = input('param.type','','trim');
     
     $data = [
         'phone_number' => $phoneNumber,
         'code' => $code,
         'type' => $type,
     ];

     $validate = new \app\api\validate\User();
     if(!$validate->scene('login')->check($data)){
        return show(config('status.error'),$validate->getError());
     }

     try {
         $result = (new \app\common\business\User())->login($data);
     } catch (\Throwable $e) {
        return show($e->getCode(),$e->getMessage());
    }

     if($result){
        return show(config('status.success'),'登录成功',$result);
     }
     return show(config('status.error'),'登录失败');
    }
}