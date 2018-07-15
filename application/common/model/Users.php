<?php

namespace app\common\model;

use think\Model;

class Users extends Model
{
    public function jwtEncrypt($password)
    {
        // 只要返回你加密后的结果，会自动比对数据库字段
        return md5($password);
    }

}
