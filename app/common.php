<?php
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
        'Status' => $status,
        'Message' => $msg,
        'Data' => $data,
    ];
    return json($result,$httpCode);
}