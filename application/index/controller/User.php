<?php
/**
 * 用户模块
 */

namespace app\index\controller;
use think\Controller;


class User extends Base
{

    /*
     * 个人消息页面
     */
    public function personal(){
        return $this->fetch('/personal');
    }

}