<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-03-01 19:27:50
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 20:20:28
 */
declare(strict_types=1);
 namespace app\common\lib;

 class Str {

    /**
      * @Descripttion: 生成token
      * @return: string
      * @Author: House
      * @Date: 2020-03-01 19:57:49
      */
     public static function getLoginToken($string) : string{
         $str = md5(uniqid(md5(microtime()),true));
         $token = sha1($str.$string);
         return $token;
     }
 }