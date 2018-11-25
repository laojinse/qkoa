<?php
// header("Content-type: text/html; charset=utf-8");
return [
    'LAO'=>'老莫',

    // 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => true,
    
    // 短信验证(聚合)
    'sendUrl'                =>  'http://v.juhe.cn/sms/send', //短信接口的URL
    // 短信配置（聚合）
    'smsConf'    => [
        'key'        => 'de8f550e4a911a854825a27c24ec0fd8', //您申请的APPKEY
        'tpl_id'     => '101312', //您申请的短信模板ID，根据实际情况修改
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
    ]
];