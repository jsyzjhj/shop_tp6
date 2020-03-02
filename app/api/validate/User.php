<?php
/*
 * @Descripttion: 用户登录校验场景
 * @Author: House
 * @Date: 2020-02-26 21:37:18
 * @LastEditors: House
 * @LastEditTime: 2020-02-27 15:47:52
 */
namespace app\api\validate;

use think\validate;
class User extends validate{

    protected $rule = [
        'username' => 'require',
        'phone_number' => 'require|length:11',
        'code' => 'require|number|length:6',
        'type' => 'require|in:1,2',
    ];

    protected $message = [
        'username' => '用户名必须',
        'phone_number.require' => '手机号必须',
        'phone_number.length' => '手机号必须是11位',
        'code.require' => '验证码必须',
        'code.number' => '验证码必须是数字',
        'code.length' => '验证码必须是6位',
        'type.require' => '类型必须',
        'type.in' => '类型数值错误',

    ];

    protected $scene = [
        'send_code' => ['phone_number'],
        'login' => ['phone_number','code','type'],
    ];
}