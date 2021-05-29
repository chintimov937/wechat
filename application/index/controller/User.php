<?php
/**
 * 用户模块
 */

namespace app\index\controller;
use think\Controller;


class User extends Controller
{
    /*
     * 登陆页面
     */
    public function login(){
        return $this->fetch('/index');
    }

    /*
     * 执行登陆
     */
    public function doLogin(){
        print_r($_POST);exit;
        $tran_id = 8001;
        $body = [
            'phone'=>13333333333,
            'password'=>'123456',
        ];
        getResponse($tran_id,$body);
    }

    /*
     * 个人消息页面
     */
    public function personal(){
        return $this->fetch('/personal');
    }

    /*
     * 注册页面
     */
    public function register(){
        return $this->fetch('/register');
    }

    /*
     * 执行注册
     */
    public function doRegister(){
        $tand_id = 8003;
        $body = [
            'phone'=>13333333333,
            'wx_id'=>'test',
            'password'=>'123456',
            'name'=>'哈哈哈',
            'idcard'=>'130726198105290019'
        ];
        return getResponse($tand_id,$body);
    }


    public function forgetpassword(){
        return $this->fetch('/wjmm');
    }

    public function changepassword(){
        return $this->fetch('/xgmm');
    }

    public function changetel(){
        return $this->fetch('/change-tel');
    }
}