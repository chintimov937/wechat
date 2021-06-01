<?php

namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $tel = session('tel');
        if($tel == null){
            $this->redirect('Login/login');
        }
    }
}