<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-02-26 20:30:35
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 22:44:00
 */
declare(strict_types=1);
namespace app\common\business;

use app\common\lib\sms\AliSms;
use app\common\lib\Num;
use app\common\lib\ClassArr;
class Sms {

    /**
     * @Descripttion: 发送验证码
     * @return: bool
     * @Author: House
     * @Date: 2020-02-26 23:59:36
     */
    public static function sendcode(string $phoneNumber,int $len,string $type = 'jd') :bool
    {
        # code...
        $code = Num::getCode($len);
       /*  //工厂模式
        $type = ucfirst($type);
        $class = "app\common\lib\sms\\".$type."Sms";
        //调用送验证码方法
        $sms = $class::sendCode($phoneNumber,$code); */

        $classStat = ClassArr::smsClassStat();
        $classObj =  ClassArr::initClass($type,$classStat);
        $sms = $classObj::sendcode($phoneNumber,$code);

        if($sms){
            //验证码保存到reids
            cache(config('redis.code_pre').$phoneNumber,$code,config('redis.code_expire'));
        }
        return true;
    }

}