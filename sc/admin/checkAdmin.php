<?php
session_start(); //啟動 session

$objResponse['success'] = false;
$objResponse['info'] = "登入失敗";

//判斷是否登入 (確認先前指派的 session 索引是否存在)
if( !isset($_SESSION['username']) && !isset($_SESSION['identity']) ) {
    header("Refresh: 3; url=../index.php");
    $objResponse['info'] = "請確實登錄";
    exit();
}

if($_SESSION['identity'] !== 'admin'){
    header("Refresh: 3; url=../index.php");
    $objResponse['info'] = "您無權使用該網頁…3秒後自動回登入頁";
    exit();
}