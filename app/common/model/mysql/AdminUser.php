<?php
namespace app\common\model\mysql;

use think\model;

//管理员模型
class AdminUser extends Model{

    //根据主键ID获取用户信息
    public function getAdminUserByUsername($username){
        if(empty($username)){
            return false;
        }
        $result = $this->where('username',trim($username))->find();
        return $result;
    }

    //根据主键ID更新表数据
    public function updateById($id,$data)
    {
        $id = intval($id);
        
        if(empty($id) || empty($data) || !is_array($data)){
            return false;
        }
     
        $result = $this->where('id',$id)->save($data);
        return $result;
    }
}