<?php

// array转json
/*
$param=array(
  "name"=>"test001",
  "pass"=>"xxxx",
);
$data = json_encode($param);
echo $data.'</br>'; // json格式的数组 {"name":"test001","pass":"xxxx"}
*/

// json取值
/*
$r = json_decode($data);
echo $r->name;
*/

// 根据点号.分割字符串
/*
$name = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im5vdGV2YWxAcHJvdG9ubWFpbC5jaCIsImlhdCI6MTYxNTgyMDIxNSwiZXhwIjoxNjE1ODIyMDE1fQ.eW3EPIgtsIoRFT1MMN54JDJcGjSO6wSbmeD2pm-NEnI";
$nameArr = explode(".", $name);
for ($i = 0; $i < count($nameArr); $i++){
    echo $nameArr[$i] . "</br>";
}
*/

/*
$alg="ATOM-Crypto"; $typ="ATOM-JWT";
echo json_encode(array("alg"=>$alg,"typ"=>$typ));
*/

/*
//进制转换
echo  base64_encode(base_convert(hash("sha256", "ATOM-Crypto"),16,10));
*/

/* cURL GET

　　//初始化
　　$ch = curl_init();
　　//设置选项，包括URL
　　curl_setopt($ch, CURLOPT_URL, "https://www.jb51.net");
　　curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
　　curl_setopt($ch, CURLOPT_HEADER, 0);
　　//执行并获取HTML文档内容
　　$output = curl_exec($ch);
　　//释放curl句柄
　　curl_close($ch);
　　//打印获得的数据
　　print_r($output);


*/

/*cURL POST

　　$url = "http://localhost/web_services.php";
　　$post_data = array ("username" => "bob","key" => "12345");
　　$ch = curl_init();
　　curl_setopt($ch, CURLOPT_URL, $url);
　　curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
　　
　　// TLS
　　curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

　　// post数据
　　curl_setopt($ch, CURLOPT_POST, 1);
　　
　　// post的变量
　　curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
　　
　　$output = curl_exec($ch);
　　curl_close($ch);
　　
　　//打印获得的数据
　　print_r($output);
*/

$token = "eyJhbGciOiJDWC1DcnlwdG8iLCJ0eXAiOiJDWC1KV1QifQ.eyJ1c2VyIjoiYXRvbSIsImlhdCI6MTYyMTI2MjMyNywiZXhwIjoxNjIxMjYyNjI3fQ.MDE5MjYwMjY4ODQyMjg4MDIyNDg2ODgwMjYyNDY2ODAwMjQ2NjA0MjA0MDA2ODIwMjQ4MDY2NDI0ODg2MDAyOA";
$Arr = explode(".", $token);
$str = json_decode(base64_decode($Arr[1]));
print_r($str->user);