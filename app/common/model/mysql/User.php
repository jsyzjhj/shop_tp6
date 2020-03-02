<?php
namespace app\common\model\mysql;

use think\model;

//管理员模型
class User extends Model{


    //自动生成写入当前时间戳
    protected $authWriteTimestamp = true;
    //根据主键ID获取用户信息
    public function getUserByPhoneNumber($phoneNubmer){
        if(empty($phoneNubmer)){
            return false;
        }
        $result = $this->where('phone_number', $phoneNubmer)->find();
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