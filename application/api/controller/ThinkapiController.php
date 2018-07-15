<?php

namespace app\api\controller;

use app\common\model\Users;
use think\Controller;
use think\Db;
use think\Request;
use Zewail\Api\Api;
use Zewail\Api\Facades\JWT;

class ThinkapiController extends Controller
{
    use Api;
    //用户密码登录
    public function login()
    {
      $credentials = ['email'=>'772984968@qq.com', 'password' => '1'];
      $token = JWT::attempt($credentials);
      return $token;

    }
    //模型管理
    public function login2(){
        $user = Users::get(1);
        $token = JWT::fromUser($user);
        return $token;
    }
    //解析json
    public function resolve(){
        if ($user = JWT::authenticate()) {
            return  $user;
            }
           return ['鉴权失败'];


    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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
