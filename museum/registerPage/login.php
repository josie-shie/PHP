<?php
session_start();
require_once 'db.inc.php';

if(isset($_POST['username']) && isset($_POST['pwd'])){
    $sql="SELECT `username`,`pwd` 
          FROM `users`
          WHERE `username`=?
          AND `pwd`=? ";

    $arrParam=[
        $_POST['username'],
        sha1($_POST['pwd'])
    ];

    $stmt=$pdo->prepare($sql);
    $stmt->execute($arrParam);

    if ($stmt->rowCount() > 0) {
        // 將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $_POST['username'];

        // 3秒後跳頁
        header("Refresh: 1; url=./itemsPage/itemlist.php");
        echo "登入成功!!! 1秒後自動進入後端頁面";
    } else {
        // 關閉session
        session_destroy();

        header("Refresh: 3; url=./index.php");
        echo "登入失敗…3秒後自動回登入頁";
    }
} else {
    // 關閉session
    session_destroy();

    header("Refresh: 3; url=./index.php");
    echo "請確實登入…3秒後自動回登入頁";
}
