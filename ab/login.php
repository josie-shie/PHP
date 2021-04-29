<?php
session_start();
//引用資料庫連線
require_once('db.inc.php');

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    //SQL 語法
    $sql = "SELECT `username`, `pwd` 
            FROM `admin` 
            WHERE `username` = ? 
            AND `pwd` = ? ";

    $arrParam = [
        $_POST['username'],sha1($_POST['pwd'])
    ];
    //跟資料庫有關都需要用到$pdo
    $pdo_stmt = $pdo->prepare($sql); //製作資料細節 將/帶出資料阻擋SQL Injection
    $pdo_stmt->execute($arrParam);//將加完反斜線的資料($arrParam)帶入$pdo_stmt

    if( $pdo_stmt->rowCount() > 0 ){ 
        //->物件導向 表示使用pdo的物件屬性(想當於js的.)
        //rowCount()計算資料庫中的影響列表
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $_POST['username'];

        //3 秒後跳頁
        header("Refresh: 3; url=./admin.php");
        require_once('templates/login_success.html');//跳轉到這個頁面
    } else {
        //關閉 session
        session_destroy();

        header("Refresh: 3; url=./index.php");
        require_once('templates/login_failed.html');
    }
} else {
    //關閉 session
    session_destroy();

    header("Refresh: 3; url=./index.php");
    echo "請確實登入…3秒後自動回登入頁";
}
