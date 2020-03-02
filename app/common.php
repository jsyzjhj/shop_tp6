<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2019-12-19 17:08:09
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 22:55:31
 */


 
// 应用公共文件
/*通用化api返回数据格式
 *@param int $status
 *@param string $msg
 *@param array $data
 *@param int $httpCode
 @return \think\response\json 
 */
function show($status,$msg = 'error',$data = [],$httpCode = 200 ){
    $result = [
        'status' => $status,
        'message' => $msg,
        'result' => $data,
    ];
    return json($result,$httpCode);
}