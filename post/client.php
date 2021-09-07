<?php
//0x001 以下代码测试正常=================================================================
header("Content-type:application/json;charset=utf-8");

//$url="http://192.168.10.234:8080/uc/login/loginid";
$url="http://10.10.10.10/test/cURL/post/server.php";

$param=array(
  //注册字段
  "name"=>"test001",
  "pass"=>"xxxx",
);

$data = json_encode($param);

list($return_code, $return_content) = http_post_data($url, $data);//return_code是http状态码
print_r($return_content);


//试验部分


//json_decode后是一个object，再从object里取出各类型数据
//$dt = json_decode($return_content);
//var_dump($dt);
//var_dump($dt->result); //这里面又是一个object

//$res_obj= $dt->result;
//echo $res_obj->name;


//试验部分


exit;

function http_post_data($url, $data_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json; charset=utf-8",
        "Content-Length: " . strlen($data_string))
    );
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();
    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return array($return_code, $return_content);
}

//0x001 以上代码测试正常=================================================================


/*
//待测试 CLIENT
function json_post($url, $data = NULL)
    {
 
        $curl = curl_init();
 
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if(!$data){
            return 'data is null';
        }
        if(is_array($data))
        {
            $data = json_encode($data);
        }
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length:' . strlen($data),
                'Cache-Control: no-cache',
                'Pragma: no-cache'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        $errorno = curl_errno($curl);
        if ($errorno) {
            return $errorno;
        }
        curl_close($curl);
        return $res;
 
    }

//SRV
$data = json_decode(file_get_contents('php://input'), true);
function deliver_response($status, $status_message, $data){
    header("HTTP/1.1 $status $status_message"); // 响应头
    
    // 相应数据包的内容【发送回客户端的数据】
    $response['stauts_code'] = $status;
    $response['status_message'] = $status_message;
    $response['result'] = $data;
    
    $json_response = json_encode($response); // 把数据进行json编码
    echo $json_response;
}

if (!empty($_GET['u']) && !empty($_GET['p'])){
    $check = auth($_GET['u'], $_GET['p']); // 定义在functions.php中的函数
    deliver_response(200, "INFO: $check", NULL); // 返回数据到客户端【发送端】
}else{
    deliver_response(400, "Request is not valid", NULL); // 返回数据到客户端【发送端】
}


*/