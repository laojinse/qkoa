<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 允许跨域
header("Access-Control-Allow-Origin:*");  //将*转化为 域名则可用 实现单一的跨域
header("Access-Control-Allow-Methods:GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type, Accept-Language, Origin, Accept-Encoding, Access_token");
header("Content-type: text/html; charset=utf-8");

// 定义应用目录
define('APP_PATH', __DIR__ . '/../app/');

// 自定义配置
define('CONF_PATH',__DIR__ . '/../config/');

// 开启调试模式
define("APP_DEBUG",true);

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
