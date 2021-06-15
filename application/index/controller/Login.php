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
        $phone = $_POST['tel'];
        $code = $_POST['code'];
        $password = $_POST['pwd'];
        $check_code = check_code($code);

        if(!$check_code){
            $data['rc'] = 1001;
            $data['rc_msg'] = '验证码错误';
            return json($data);
        }

        $tran_id = 8004;
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
     * 修改密码
     */
    public function changepassword(){
        if(!session('tel')){
            $this->redirect('User/personal');
        }
        return $this->fetch('/xgmm');
    }

    /*
     * 执行修改密码
     */
    public function doChangepassword(){
        $phone = session('tel');
        $opwd = $_POST['opwd'];
        $npwd = $_POST['pwd'];

        $tran_id = 8006;
        $body = [
            'phone'=>$phone,
            'password'=>$opwd,
            'newpassword'=>$npwd,
        ];

        $res = getResponse($tran_id,$body);
        return json($res);

    }

    /*
     * 修改手机号
     */
    public function changetel(){
        if(!session('tel')){
            $this->redirect('User/personal');
        }
        $this->assign('tel',session('tel'));
        return $this->fetch('/change-tel');
    }

    /*
     * 执行修改手机号
     */
    public function doChangetel(){
        $ophone = session('tel');
        $nphone = $_POST['tel'];
        $code = $_POST['code'];
        $check_code = check_code($code);
        if(!$check_code){
            $data['rc'] = 1001;
            $data['rc_msg'] = '验证码错误';
            return json($data);
        }

        $tran_id = 8005;
        $body = [
            'phone'=>$ophone,
            'newphone'=>$nphone,
        ];
        $res = getResponse($tran_id,$body);
        if($res['rc'] == 0){
            Session::set('tel',$nphone);
        }
        return json($res);
    }

    /*
     * 实名认证
     */
    public function certification(){
        if(!session('tel')){
            $this->redirect('User/personal');
        }
        return $this->fetch('smrz');
    }

    /*
     * 执行失明认证
     */

    public function doCertication(){

    }


    /*
     * 退出登陆
     */
    public function loginout(){
        Session::set('tel',null);
        return $this->fetch('/index');
    }
}

