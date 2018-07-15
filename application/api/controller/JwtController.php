<?php

namespace app\api\controller;

use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use think\Controller;
use think\Request;

class JwtController extends Controller
{
   protected  static  $key='limaolin@key';
    //根据用户信息进行签名
    public function index()
    {
          $token=[
            //发行人
            'iis'=>$_SERVER['HTTP_HOST'],
            //观众
            "aud" => "http://example.com",
            //签发时间
            "iat" => time(),
            //可以开始使用时间
            "nbf" => time(),
            //签名过期时间
            "exp"=>time()+60,
            "data"=>[
                'user_id'=>12,
                'user_name'=>'lisi',
            ],
        ];
        $jwt=JWT::encode($token,JwtController::$key);
        return $jwt;
    }
    //解析token
    public function verification(Request $request){
        $key = 'limaolin@key'; //key要和签发的时候一样
//        $jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cuaGVsbG93ZWJhLm5ldCIsImF1ZCI6Imh0dHA6XC9cL3d3dy5oZWxsb3dlYmEubmV0IiwiaWF0IjoxNTI1MzQwMzE3LCJuYmYiOjE1MjUzNDAzMTcsImV4cCI6MTUyNTM0NzUxNywiZGF0YSI6eyJ1c2VyaWQiOjEsInVzZXJuYW1lIjoiXHU2NzRlXHU1YzBmXHU5Zjk5In19.Ukd7trwYMoQmahOAtvNynSA511mseA2ihejoZs7dxt0"; //签发的Token


        $jwt_arr=explode(' ',$request->header('Authorization'));
        if ($jwt_arr[0]!='Bearer'){
            return json(['code'=>400,'error'=>'token不正确']);
        }
        $jwt=$jwt_arr[1];

        try {

            JWT::$leeway = 60;//当前时间减去60，把时间留点余地
            $decoded = JWT::decode($jwt,JwtController::$key, ['HS256']); //HS256方式，这里要和签发的时候对应
            $arr = (array)$decoded;
            print_r($arr);
        } catch(SignatureInvalidException $e) {  //签名不正确
            echo $e->getMessage();
        }catch(BeforeValidException $e) {  // 签名在某个时间点之后才能用
            echo $e->getMessage();
        }catch(ExpiredException $e) {  // token过期
            echo $e->getMessage();
        }catch(Exception $e) {  //其他错误
            echo $e->getMessage();
        }

    }
       /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
