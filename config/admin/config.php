<?php
return [
    'template'  => [
        //视图分离  视图根所在路径 
        //入口文件在public下admin.php 注意这个相对位置是 相对于 该config.php 问价的
        'view_base'=>__DIR__.'/../../admin/', 
    ],
    // 替换视图输出的字符串
    //明确以下几点  
    // 1. 公共资源文件尽量放在public文件夹下  因为public 是默认唯一一个对外可访问的文件夹
    // 2. 目录位置 是相对于 入口文件的
    'view_replace_str'  => [
        '__CSS__' => '/base',  
        '__JS__' => '/base',
    ],
    // session 设置
    'session'           => [
        // 前缀
        'prefix'         => 'think',
        // 类型
        'type'           => '',
        // 是否自动开启
        'auto_start'     => true,
        // 过期时间
        'expire'         => 11111111,
        // 是否使用cookie
        'use_cookies'    => true,
    ],

    'myadmin'           =>[
        'a'  => 'admin'
    ],
    // 测试
    'laomomg' => '测试成功' ,
    // session
    'session'                => [
        'type'           => '',
        'auto_start'     => true,
        'expire'         => 3600*2,//过期时间
    ],
    
];