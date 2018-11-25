<?php
namespace app\index\controller;
use think\Db;

class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    public function lmtest()
    {
        // 动态链接数据库 
        $dbconfig =[
            'type'=>'mysql',       //数据库类型
            'hostname'=>'106.14.30.64',   //数据库地址
            'username'=>'root',           //数据库用户名
            'password'=>'root',         //数据库密码
            'database'=>'xin07726631'    //数据库名称
        ];

        $pwd = md5(md5(123456));
        $name = 'xixiaowen';

        $link = Db::connect($dbconfig);

        $a = $link->table('xy_user')->where([
                'name'=>['=',$name]
                ,'pwd'=>['=',$pwd]
            ])->select();

        downjson(0,'登录成功',$pwd,$a);
    }
    
}


