<?php
/*
 * @Descripttion: 京东短信场景
 * @Author: House
 * @Date: 2020-02-26 19:20:22
 * @LastEditors: House
 * @LastEditTime: 2020-02-27 10:51:32
 */
declare(strict_types=1);
namespace app\common\lib\sms;

class JdSms {

    /**
     * @Descripttion: 京东云短信发送
     * @return: bool
     * @Author: House
     * @Date: 2020-02-26 20:11:37
     */
    public  static function sendCode(String $phone, int $code) : bool{
        return true;
    }
}
