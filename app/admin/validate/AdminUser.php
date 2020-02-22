<?php
namespace app\admin\validate;

use think\Validate;

class AdminUser  extends Validate{

     protected $rule =[
        'username' => 'require',
        'password' => 'require',
        'captcha' => 'require|captCha'
     ];

     protected $message =[
        'username' => '用户名必须',
        'password' => '密码必须',
        'captcha' => '验证码必须'
     ];

     protected function captCha($value,$rule,$data = []){
        //验证码校验
        if(!captcha_check($value)){
            return '验证码错误！';
        }
        return true;
    }

}