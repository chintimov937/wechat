<?php
/**
 * Created by PhpStorm.
 * User: sxy
 * Date: 2018/3/1
 * Time: 9:38
 */

namespace app\index\controller;
use think\Controller;


class User extends Controller
{
    public function login(){
        return $this->fetch('/index');
    }

    public function personal(){
        return $this->fetch('/personal');
    }

    public function register(){
        return $this->fetch('/register');
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