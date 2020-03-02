<?php
/*
 * @Descripttion: 
 * @Author: House
 * @Date: 2020-02-26 20:13:25
 * @LastEditors: House
 * @LastEditTime: 2020-03-01 22:38:38
 */
use think\facade\Route;

// ->allowCrossDomain()允许跨域请求
Route::rule('smscode','sms/code','POST')->allowCrossDomain();   
Route::rule('login','login/index','POST')->allowCrossDomain(); 