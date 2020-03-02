<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-02-26 20:14:52
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 21:07:44
 */
declare(strict_types=1);
namespace app\api\controller;

use app\BaseController;
use app\common\business\Sms as SmsBus;
class Sms extends BaseController{


    /**
     * @Descripttion: 获取验证码
     * @return: json
     * @Author: House
     * @Date: 2020-02-27 00:01:26
     */
    public function code() :object
    {

        $phoneNumber = input('param.phone_number','','trim');
        
        $data = [
            'phone_number' => $phoneNumber
        ];
        try {
            //用户数据校验
            validate(\app\api\validate\User::class)->scene('send_code')->check($data);
        } catch (\think\exception\ValidateException $e) {
          
            return show(config('status.error'),$e->getError());
        }

        //调用发送验证码
        if(SmsBus::sendcode($phoneNumber,config('aliyun.code_number'),"jd")){
            return show(config('status.success'),'发送验证码成功');
        }
        return show(config('status.error'),'发送验证码失败!');
    }
}
