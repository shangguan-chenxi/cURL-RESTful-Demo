<?php
header("Content-type:application/json;charset=utf-8");


$url = "http://10.10.10.10/test/cURL/server.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

if (!empty($_GET['token'])){
    $post_data = array("token" => $_GET['token']);
    $data_string = json_encode($post_data);
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
    list($return_code, $return_content) = array($return_code, $return_content);
    print_r($return_content);
    
    
    /*
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    // TLS
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    
    // post数据
    //curl_setopt($ch, CURLOPT_POST, 1);
    
    // post的变量
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    $output = curl_exec($ch);
    curl_close($ch);
    
    //打印获得的数据
    echo json_decode($output);
    */
    
    
}elseif($_GET['action'] == 'issue' && !empty($_GET['user'])){
    $post_data = array("user" => $_GET['user']);
    $data_string = json_encode($post_data);
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
    list($return_code, $return_content) = array($return_code, $return_content);
    print_r($return_content);
}else{
    print_r('{"stauts_code":"404","status_message":"token required"}');
}
    