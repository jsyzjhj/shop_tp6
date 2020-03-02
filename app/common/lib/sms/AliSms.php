<?php
/*
 * @Descripttion: 阿里云短信场景
 * @Author: House
 * @Date: 2020-02-26 19:20:22
 * @LastEditors: House
 * @LastEditTime: 2020-02-27 10:01:42
 */
declare(strict_types=1);
namespace app\common\lib\sms;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use think\facade\Log;

class AliSms {
// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md


    /**
     * @Descripttion: 阿里云短信发送
     * @return: bool
     * @Author: House
     * @Date: 2020-02-26 20:11:37
     */
    public  static function sendCode(String $phone, int $code) : bool{
        if(empty($phone) ||  empty($code)){
            return false;
        }

        AlibabaCloud::accessKeyClient(config('aliyun.access_key_id'), config('aliyun.access_key_secret'))
                                ->regionId(config('aliyun.region_id'))
                                ->asDefaultClient();


        $TemplateParam_code = [
            'code' => $code
        ];
        try {
            $result = AlibabaCloud::rpc()
                                ->product('Dysmsapi')
                                // ->scheme('https') // https | http
                                ->version('2017-05-25')
                                ->action('SendSms')
                                ->method('POST')
                                ->host(config('aliyun.host'))
                                ->options([
                                                'query' => [
                                                'RegionId' => config('aliyun.region_id'),
                                                'PhoneNumbers' => $phone,
                                                'SignName' => config('aliyun.sign_name'),
                                                'TemplateCode' => config('aliyun.template_code'),
                                                'TemplateParam' => json_encode($TemplateParam_code),
                                                ],
                                            ])
                                ->request();
            Log::info("aliSms-sendCode-{$phone}-result".json_encode($result->toArray()));
            //print_r($result->toArray());
        } catch (ClientException $e) {
            Log::info("aliSms-sendCode-{$phone}-ClientException".$e->getErrorMessage());
           // echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            Log::info("aliSms-sendCode-{$phone}-ServerException".$e->getErrorMessage());
           // echo $e->getErrorMessage() . PHP_EOL;
        }
        return true;
    }
}

 
