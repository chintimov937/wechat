<?php
/**
 * Created by PhpStorm.
 * User: sxy
 * Date: 2018/3/2
 * Time: 11:24
 */
namespace app\index\controller;
use think\Controller;

class Appointment extends Controller
{
    public function address(){
        return $this->fetch('/address');
    }

    public function line(){
        return $this->fetch('/yypd');
    }

    public function showline(){
        return $this->fetch('/yyzs');
    }
}