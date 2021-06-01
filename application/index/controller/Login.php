<?php

/*
 * 登陆模块
 */

namespace app\index\controller;
use think\Controller;
use think\Session;

class Login extends Controller
{
    /*
     * 登陆页面
     */
    public function login(){
        if(session('tel')){
            $this->redirect('User/personal');
        }
        return $this->fetch('/index');
    }

    /*
     * 执行登陆
     */
    public function doLogin(){
        $phone = $_POST['tel'];
        $password = $_POST['pwd'];
        $tran_id = 8001;
        $body = [
            'phone'=>$phone,
            'password'=>$password,
        ];
        $res = getResponse($tran_id,$body);
        if($res['rc'] == 0){
            Session::set('tel',$phone);
        }
        return json($res);
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
        $phone = $_POST['tel'];
        $password = $_POST['pwd'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        if(empty($name)){
            $data['rc'] = 1;
            $data['msg'] = '请填写姓名';
            return json($data);
        }
        $card = $_POST['card'];
        $check_code = check_code($code);
        if(!$check_code){
            $data['rc'] = 1001;
            $data['rc_msg'] = '验证码错误';
            return json($data);
        }
        $tran_id = 8003;
        $body = [
            'phone'=>$phone,
            'wx_id'=>'test',
            'password'=>$password,
            'name'=>$name,
            'idcard'=>$card
        ];
        $res = getResponse($tran_id,$body);
        if($res['rc'] == 0){
            Session::set('tel',$phone);
        }
        return json($res);

    }

    /*
     * 忘记密码
     */
    public function forgetpassword(){
        return $this->fetch('/wjmm');
    }

    /*
     * 执行忘记密码
     */
    public function doForgetpassword(){
        
    }

    public function changepassword(){
        return $this->fetch('/xgmm');
    }

    public function changetel(){
        return $this->fetch('/change-tel');
    }

    /*
     * 退出登陆
     */
    public function loginout(){
        Session::set('tel',null);
        return $this->fetch('/index');
    }
}

