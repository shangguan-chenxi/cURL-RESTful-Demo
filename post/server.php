<?php
//0x001 以下代码测试正常=================================================================
$data = json_decode(file_get_contents('php://input'), true);

/*
$file = fopen("./r.txt", "w");
fwrite($file, json_encode($data));
fclose($file);
*/



deliver_response(200, "Received", $data);

function deliver_response($status, $status_message, $data){
    header("HTTP/1.1 $status $status_message"); // 响应头
    
    // 相应数据包的内容【发送回客户端的数据】
    $response['stauts_code'] = $status;
    $response['status_message'] = $status_message;
    $response['result'] = $data;
    
    $json_response = json_encode($response); // 把数据进行json编码, json_decode后是object
    echo $json_response;
}
//0x001 以上代码测试正常=================================================================