<?php
/*
 * @Descripttion: 全局中间件定义文件
 * @Author: House
 * @Date: 2020-02-22 11:24:23
 * @LastEditors: House
 * @LastEditTime: 2020-02-22 11:25:31
 */

return [
    // 全局请求缓存
    // \think\middleware\CheckRequestCache::class,
    // 多语言加载
    // \think\middleware\LoadLangPack::class,
    // Session初始化
    \think\middleware\SessionInit::class,
    app\admin\middleware\Auth::class
];
