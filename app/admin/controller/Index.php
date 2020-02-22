<?php
/*
 * @Descripttion: 后台首页
 * @Author: House
 * @Date: 2020-02-22 11:19:26
 * @LastEditors: House
 * @LastEditTime: 2020-02-22 11:22:35
 */
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;

class Index extends BaseController{

     public function index(){
         return View::fetch();
     }
     public function welcome(){
        return View::fetch();
     }
     
}