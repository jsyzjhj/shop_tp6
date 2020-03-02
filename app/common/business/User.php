<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-02-27 15:52:32
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 22:49:24
 */
namespace app\common\business;

use app\common\lib\Str;
use app\common\lib\Time;
use app\common\model\mysql\User as UserModel;

class User {
    public $userObj = null;
    public function __construct()
    {
        $this->userObj= new UserModel();
    }

    public function login($data){
        $redisCode = cache(config('redis.code_pre').$data['phone_number']);
        /* if(empty($redisCode) || $redisCode != $data['code']){
            throw new \think\Exception("验证码无效");
        } */
    
    
        $user = $this->userObj->getUserByPhoneNumber($data['phone_number']);
        if(!$user){
            $username = "叶过房-".$data['phone_number'];
            $userData = [
                'username' => $username,
                'phone_number' => $data['phone_number'],
                'type' => $data['type'],
                'status' => config('status.mysql.user_normal'),
            ];

            try {
                $this->userObj->save($userData);    
                $userId = $this->userObj->id;
            } catch (\Exception $e) {
                // throw new \think\Exception("用户登录-数据库内部错误");
                throw new \think\Exception($e->getMessage());
            }

          

        } else{
            $userId = $user->id;
            $username = $user->username;
            $userData = [
                'type' => $data['type'],
                'status' => config('status.mysql.user_normal'),
            ];

            try {
                $user->save($userData);    
            } catch (\Exception $e) {
                // throw new \think\Exception("用户登录-数据库内部错误");
                throw new \think\Exception($e->getMessage());
            }
        }

        //获取生成的token
        $token = Str::getLoginToken($data['phone_number']);
        //保存在reids的数据
        $redisData = [
            'id' =>$userId,
            'username' => $username,
        ];
        //保存到redis
        $res = cache(config('redis.token_pre').$token,$redisData,Time::userLoginExpiersTime($data['type']));
        return $res ? ['token'=> $token, 'username' => $username] : false;

    }

    


}
