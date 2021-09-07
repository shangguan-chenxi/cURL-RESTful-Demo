        <html>
            <head>
              <title>Login</title>
            </head>
            
            <body>
            
            <h2> Please log in your account</h2>
            
              <div>
                <div class="container">
                  <form action="./RESTfulPHPClient.php" method="get">
            		  <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" id="username"  name="username" >
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
        </html>

<?php
/*
$parameter = "Colosseum";

$url="144.6.232.6/kit214-project/tutorial-4/RESTfulPHPServic.php?wonderName=$parameter"; 
$client = curl_init($url); 

echo "Wonder Name : $parameter"; 

curl_setopt($client,CURLOPT_RETURNTRANSFER,1); 
//curl_setopt($client,CURLOPT_POSTFIELDS,$data);
$response = curl_exec($client);
//print $response; 
$result = json_decode($response); 
echo "<br/>"; 
//echo "Located Place : $result->result"; // bug, reslut is always NULL
echo "Located Place : $result->status_message";
*/

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



?> 

