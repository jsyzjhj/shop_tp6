<?php
namespace app\admin\business;

use app\common\model\mysql\AdminUser as AdminUserModel;
use Exception;
use think\facade\Session;

class AdminUser {
    public  static function login($data){
        try {
            $adminUserObj = new AdminUserModel();
            $adminUser = self::getAdminUserByUsername($data['username']);
            if(empty($adminUser)){
                throw new Exception('不存在该用户！');
            }
            //密码校验
            if($adminUser['password'] != md5($data['password'])){
                throw new Exception('密码错误！');
            }
            
            //需要记录信息到mysql中
            $updateDate = [
                'last_login_time' => time(),
                'last_login_ip' =>request()->ip(),
            ];
            $res = $adminUserObj->updateById($adminUser['id'],$updateDate);
            if(empty($res)){
                throw new Exception('登陆失败！');
            } 
        }catch(\Exception $e){
            throw new Exception('内部异常，登陆失败！');
        }
        //记录session
        Session::set(config('admin.admin_user'),$adminUser);
        return true;
    }


    public static function getAdminUserByUsername($username){
          //用户信息查询
          $adminUserObj = new AdminUserModel();
          $adminUser = $adminUserObj->getAdminUserByUsername($username);
          if(empty($adminUser) || $adminUser->status !=  config('status.mysql.admin_normal')){
             return false;
          }
          $adminUser = $adminUser->toArray();
          return $adminUser;
    }

}