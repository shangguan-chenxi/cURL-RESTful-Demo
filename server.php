<?php
$SECRET = "Atomania-JWT-Sign_STR=>Chenxi";
$LIFE_SPAN = 60 * 30;

function issue_token($usr){
    global $LIFE_SPAN;
    $token_header = json_encode(array("alg"=>"HS256", "typ"=>"JWT"));
    $token_body = json_encode(array("user"=>$usr,"iat"=>time(), "exp"=>time() + $LIFE_SPAN));
    $str = str_replace('=','',base64_encode($token_header)) . '.' . str_replace('=','',base64_encode($token_body));
    $signature = str_replace('=','',crypto($str));
    return $str . '.' . $signature;
}

function validate_token($token){
    $Arr = explode(".", $token);
    $str = $Arr[0] . '.' . $Arr[1];
    $signature = crypto($str);
    return (base64_decode($signature) == base64_decode($Arr[2]));
}

function crypto($str){
    global $SECRET;
    return base64_encode(base_convert(hash("sha256", $str.$SECRET),16,10));
}

function attache_value(&$response, $key, $value){
    $response[$key] = $value;
}


//$usr = "atom";
//$signed_token = issue_token($usr);
//$signed_token = "eyJhbGciOiJDWC1DcnlwdG8iLCJ0eXAiOiJDWC1KV1QifQ.eyJ1c2VyIjoiYXRvbSIsImlhdCI6MTYyMTI2MjMyNywiZXhwIjoxNjIxMjYyNjI3fQ.MDE5MjYwMjY4ODQyMjg4MDIyNDg2ODgwMjYyNDY2ODAwMjQ2NjA0MjA0MDA2ODIwMjQ4MDY2NDI0ODg2MDAyOA";

//echo $signed_token . '</br>';
/*
if (validate_token($signed_token) == true){
    echo "passed";
}else{
    echo "failed";
}
*/

$data = json_decode(file_get_contents('php://input'));
$jwt = $data->token;
$user = $data->user;
$role = $data->role;

if (!empty($jwt)){
    if (validate_token($jwt) == true){
        header("HTTP/1.1 200 Found"); // 响应头
        $response['stauts_code'] = '200';
        $response['status_message'] = "pass";
        
        $Arr = explode(".", $jwt);
        $str = json_decode(base64_decode($Arr[1]));
        
        $response['user'] = $str->user;
        $response['iat'] = $str->iat;
        $response['exp'] = $str->exp;
        
        $json_response = json_encode($response);
        echo $json_response;
    }else{
        header("HTTP/1.1 200 Found"); // 响应头
        $response['stauts_code'] = '500';
        $response['status_message'] = "fail";
        $json_response = json_encode($response);
        echo $json_response;
    }
}elseif(!empty($user)){
    header("HTTP/1.1 200 Found"); // 响应头
    $response['stauts_code'] = '200';
    $response['status_message'] = "issued";
    $response['jwt'] = issue_token($user);
    $json_response = json_encode($response);
    echo $json_response;
}else{
    header("HTTP/1.1 200 Found"); // 响应头
    $response['stauts_code'] = '404';
    $response['status_message'] = "empty";
    $json_response = json_encode($response);
    echo $json_response;
}