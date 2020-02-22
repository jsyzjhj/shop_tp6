<?php
/* 该文件用于存放业务状态吗相关配置 */
return [
    'success' => 200,
    'error'  => 201,
    'action_not_found' => -3,
    'controller_not_found' => -4,

    'mysql' =>[
        'admin_normal' => 1,    //正常
        'admin_pedding' => 0,   //待审核
        'admin_delete' => 99,   //删除
    ],
];