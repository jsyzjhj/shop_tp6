<?php
/*
 * @Descripttion: 数字类型的基础类库
 * @Author: House
 * @Date: 2020-02-27 09:34:53
 * @LastEditors: House
 * @LastEditTime: 2020-02-27 09:43:27
 */
declare(strict_types=1);
namespace app\common\lib;

class Num {
    
    /**
     * @Descripttion: 生成指定位数的随机数
     * @return: int
     * @Author: House
     * @Date: 2020-02-27 09:38:09
     */
    public static function getCode(int $len) : int{
        $code = rand(1000,9999);
        if($len == 6){
            $code = rand(100000,999999);
        }
        return $code;
    }
}