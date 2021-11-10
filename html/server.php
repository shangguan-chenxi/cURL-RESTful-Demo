<?php
header("Content-type:application/json");
header("Charset=utf-8");
header("HTTP/1.1 200 Found"); // 响应头

$data = json_decode(file_get_contents('php://input'));
$jwt = $data->token;
$user = $data->user;
$role = $data->role;
$pass = $data->pass;

$USER = "admin";
$PASS = "admin888";

if($user == ""){
    $response['status_code'] = '500';
    $response['status_message'] = "用户不能为空";
    $json_response = json_encode($response);
    echo $json_response;
}elseif($pass == ""){
    $response['status_code'] = '500';
    $response['status_message'] = "密码不能为空";
    $json_response = json_encode($response);
    echo $json_response;
}else{
    if($user == $USER && $pass == $PASS){
        $response['status_code'] = '200';
        $response['status_message'] = "验证通过";
        
    $json_response = json_encode($response);
    echo $json_response;
    }else{
        $response['status_code'] = '401';
        $response['status_message'] = "验证失败";
        
    $json_response = json_encode($response);
    echo $json_response;
    }
}
