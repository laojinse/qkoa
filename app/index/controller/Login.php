<?php
namespace app\index\controller;
use think\Request;
use think\Db;  

// 引入jwt
use \Firebase\JWT\JWT;

class Login
{
    
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
    public function mv()
    {
        return '我进来了';
    }

    // 执行登录
    public function dologin(Request $request)
    {
        // 非空验证
        if(!$request->param('username')){
            downjson($code=1,$msg='用户名不能为空');
        }
        if(!$request->param('password')){
            downjson($code=1,$msg='密码不能为空');
        }
        if(!$request->param('vercode')){
            downjson($code=1,$msg='验证码不能为空');
        }

        $dbconfig =[
            'type'=>'mysql',       //数据库类型
            'hostname'=>'106.14.30.64',   //数据库地址
            'username'=>'root',           //数据库用户名
            'password'=>'root',         //数据库密码
            'database'=>'xin07726631'    //数据库名称
        ];
        
        $link = Db::connect($dbconfig);

        $lmb = $link->table('xy_user')->where([
            'name'=>['=',$request->param('username')]
            ,'pwd'=>['=',md5(md5($request->param('password')))]
        ])->find();
        
        //登录用户验证
        if(!$lmb){
            downjson(1,$msg='登录失败，请核对用户名与密码');
        }
        // 在这生成jwt并且返回给前端
        $result=array(  
            'code'=> 0
            ,'msg'=> "登录成功"
            ,'data'=> array(
              "access_token" => $this->lssue($lmb['id'],$lmb['username'])
            )  
        );  
        

        exit( json_encode($result, JSON_UNESCAPED_UNICODE) );

    }

   //签发Token
	public function lssue($id,$username)
	{
		$key = 'laomo'; //key
		$time = time(); //当前时间
       		$token = [
        	'iss' => '', //签发者 可选
           	'aud' => '', //接收该JWT的一方，可选
           	'iat' => $time, //签发时间
           	'nbf' => $time , //(Not Before)：某个时间点后才能访问，比如设置time+30，表示当前时间30秒后才能使用
           	'exp' => $time+7200, //过期时间,这里设置2个小时
            	'data' => [ //自定义信息，不要定义敏感信息
             		'userid' => $id,
               		'username' => $username
            ]
        ];
        return JWT::encode($token, $key); //输出Token
	}

       
}


