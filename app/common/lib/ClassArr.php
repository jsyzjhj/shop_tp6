<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-02-27 11:13:50
 * @LastEditors: House
 * @LastEditTime: 2020-02-27 11:24:56
 */
namespace app\common\lib;

use Reflection;
use ReflectionClass;

class ClassArr{

    public static function smsClassStat(){
        return [
            'ali' => 'app\common\lib\sms\AliSms',
            'jd' => 'app\common\lib\sms\JdSms',
            'baidu' => 'app\common\lib\sms\BaiduSms',
        ];

    }
    public static function initClass($type,$class,$prama=[],$needInstance = false){
        //1.如果我们的工厂模式调用的方法是静态的，则返回基础类库。
        //2.如果不是静态，则返回对象。
        if(!array_key_exists($type,$class)){    
            return false;
        }
        $className = $class[$type];
        // new ReflectionClass('A') 建立A反射类
        //->newInstanceArgs($args) 相当于实例化a对象 
        return $needInstance == true ? (new ReflectionClass($className))->newInstanceArgs($prama) : $className;
    }
    
}