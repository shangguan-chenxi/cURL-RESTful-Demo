<?php


$u = $_GET['username']; $p = $_GET['password'];

if ($u || $p){
    
$url="144.6.232.6/kit214-project/tutorial-4/RESTfulPHPServic.php?u=$u&p=$p"; 
/**   —————————————————————————————————————————————————————————— ---------
 *                              |                                     |
 *                      接收参数的页面                     要传递的参数和相应的值
 * 这是客户端构造的GET请求
 */

$client = curl_init($url);                                                   // 初始化发送端【客户端是发送端】，通过CURL构造请求
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);                               // 开启handler
$response = curl_exec($client);                                              // 把请求发送到服务端【服务端是接收端】，服务端返回数据
$result = json_decode($response);                                            // json解码服务端所返回的数据                  
echo "$result->status_message";                                              // 取出相应/所需的数据【服务端所返回的】

}

/*服务端 GET
    header("HTTP/1.1 $status $status_message"); // 响应头
    
    // 相应数据包的内容【发送回客户端的数据】
    $response['stauts_code'] = $status;
    $response['status_message'] = $status_message;
    $response['result'] = $data;
    
    $json_response = json_encode($response); // 把数据进行json编码
    echo $json_response;
*/