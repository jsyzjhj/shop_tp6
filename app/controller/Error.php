<?php
namespace app\controller;

class Error {
    public function __call($name, $arguments)
    {
        $data = [
            'status' => config('status.controller_not_found'),
            'msg' => '找不到该控制器！',
            ];
         return json($data,200);
    }
}