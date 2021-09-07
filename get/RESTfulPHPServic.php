<?php

header("Content_Type:application/json");
include("./functions.php");

/*
if (!empty($_GET['wonderName'])){
    $wondername = $_GET['wonderName'];
    $place = wonderLocatedPlace($wondername);
    
    if(empty($token)){
        deliver_response(200, "wonder not found", NULL);
    }else{
        deliver_response(200, "wonder place: $token", NULL);
    }
    
}else{
    deliver_response(400, "Request is not valid", NULL);
}
*/

/*
把数据json编码后返回给客户端【也就是发送端】
数据结构是自定义的
只需要在客户端按照原数据结构使用即可
*/
function deliver_response($status, $status_message, $data){
    header("HTTP/1.1 $status $status_message"); // 响应头
    
    // 相应数据包的内容【发送回客户端的数据】
    $response['stauts_code'] = $status;
    $response['status_message'] = $status_message;
    $response['result'] = $data;
    
    $json_response = json_encode($response); // 把数据进行json编码
    echo $json_response;
}


/*
客户端所构造的GET请求
$url="144.6.232.6/kit214-project/tutorial-4/RESTfulPHPServic.php?u=$u&p=$p"; 
                                                                 ---- ————           
                |——————————————————————————————————————————————————|    |                                                        
                |                                                       |     
                |                      ---------------------------------|     
                |                      |                                      
                |                      |                                      
           _____|____            ______|___                                    
           |        |            |        |     */
if (!empty($_GET['u']) && !empty($_GET['p'])){
    $check = auth($_GET['u'], $_GET['p']); // 定义在functions.php中的函数
    deliver_response(200, "INFO: $check", NULL); // 返回数据到客户端【发送端】
}else{
    deliver_response(400, "Request is not valid", NULL); // 返回数据到客户端【发送端】
}
