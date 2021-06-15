<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/*
 * 发送post请求
 */
function curlPost($data){
    //$url = 'http://www.sino-device.com.cn:9040/web/orderservlet';
    $url = 'http://10.50.111.128:9080/web/orderservlet';
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, 1);
    //设置post数据
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //执行命令
    $res = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    return $res;
}

/*
 * 请求接口
 */
function getApi($data){
    //$url = 'http://www.sino-device.com.cn:9040/web/orderservlet';
    $url = 'http://10.50.111.128:9080/web/orderservlet';

    $setting = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => $data
        )
    );

    $context = stream_context_create($setting);
    $response = file_get_contents($url, false, $context);
    return $response;
}

/*
 * 请求接口
 */

function getResponse($tran_id,$body){
    $data = [
        'head'=>[
            'tran_id'=>$tran_id,
            'tran_date'=>(string)date('Ymd'),
            'tran_time'=>(string)time(),
        ],
        'body'=>$body
    ];
    $data = json_encode($data);
    $response = json_decode(getApi($data),true);
    return $response;
}

/*
 * 检测验证码
 */
function check_code($code){
    return true;
}
