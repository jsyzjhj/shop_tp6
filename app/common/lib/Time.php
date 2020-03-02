<?php
/*
 * @Descripttion: 处理的时间工具类
 * @Author: House
 * @Date: 2020-03-01 20:10:22
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 20:21:10
 */
declare(strict_types=1);
 namespace app\common\lib;


 class Time{
     public static function userLoginExpiersTime($type) : int{
        if($type == 1){
            $day = $type * 7;
        }elseif($type ==2){
            $day =$type * 30;
        }
        return $day * 24 * 3600;
     }
 }
