<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use \Firebase\JWT\JWT; //导入JWT

class Base extends Controller
{
    public function m(Request $request)
    {
        $a = $request->param('access_token');

        downjson($code=0,$msg=$a);
    }

    // // 验证tooken
	public function verification(Request $request)
	{
		$key = 'laomo'; //key要和签发的时候一样

		$jwt =  $request->param('access_token'); //签发的Token
        
        try {
            JWT::$leeway = 60;//当前时间减去60，把时间留点余地
            $decoded = JWT::decode($jwt, $key, ['HS256']); //HS256方式，这里要和签发的时候对应
            $arr = (array)$decoded;
            // return $arr;
            downjson($code=0,$msg='成功','',$data=$arr['data']);
        } catch(\Firebase\JWT\SignatureInvalidException $e) {  //签名不正确
            // return $e->getMessage();
            downjson($code=0,$msg=$e->getMessage(),'',$data=$arr);
        }catch(\Firebase\JWT\BeforeValidException $e) {  // 签名在某个时间点之后才能用
            // return $e->getMessage();
            downjson($code=0,$msg=$e->getMessage(),'',$data=$arr);
        }catch(\Firebase\JWT\ExpiredException $e) {  // token过期
            // return $e->getMessage();
            downjson($code=0,$msg=$e->getMessage(),'',$data=$arr);
        }catch(Exception $e) {  //其他错误
            // return $e->getMessage();
            downjson($code=0,$msg=$e->getMessage(),'',$data=$arr);
        }
	    //Firebase定义了多个 throw new，我们可以捕获多个catch来定义问题，catch加入自己的业务，比如token过期可以用当前Token刷新一个新Token
	}
}
