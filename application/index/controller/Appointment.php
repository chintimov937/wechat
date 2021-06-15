<?php

//预约模块
namespace app\index\controller;
use think\Controller;

class Appointment extends Controller
{
    public function address(){
        return $this->fetch('/address');
    }

    /*
     * 预约
     */
    public function line(){
        return $this->fetch('/yypd');
    }

    /*
     * 预约展示
     */
    public function showline(){
        return $this->fetch('/yyzs');
    }

    /*
     * 获取营业厅
     */
    public function getBusinessHall(){

        $city = $_POST['post_data'];
        $city = substr(strstr($city,'-'),1);
        //return $city;
        $tran_id = 8007;

        $body = [
            'city_code'=>$city,
        ];
        $res = getResponse($tran_id,$body);
        $data = [];
        //print_r($res);exit;
        if($res['rc'] == 0){
            $data['rc'] = $res['rc'];
            foreach ($res['body'] as &$v){
                $v['value'] = $v['id'];
            }
            $data['body'] = $res['body'];
            return json($data);
        }else{
            return json($res);
        }
    }

    /*
      * 获取业务类型
    */
    public function getBussiness(){
        $service_hall_id = '313';
        //$service_hall_id = $_POST['id'];
        $tran_id = '8008';

        $body = [
            'service_hall_id' => $service_hall_id,
        ];
        $res = getResponse($tran_id,$body);
        $data = [];
        if($res['rc'] == 0){
            $data['rc'] = 0;
            foreach ($res['body']['service'] as &$v){
                $v['value'] = $v['id'];
            }
            $data['body'] = $res['body']['service'];
            return json($data);
        }else{
            return json($res);
        }
    }

    /*
     * 预约排队
     */
    public function Doappointment(){
        return $_POST;
    }

}