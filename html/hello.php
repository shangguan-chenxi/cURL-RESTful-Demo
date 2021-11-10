<?php
session_start();

if($_GET['action'] == 'exit'){
    session_destroy();
    session_start();
}

if(!isset($_SESSION["u"])){
    header("Location: ./client.html");
    exit;
}

echo '用户：' . $_SESSION['u'] . ', <a href="./hello.php?action=exit">退出</a>';
