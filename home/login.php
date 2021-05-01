<?php
//session_start();
//引用資料庫連線
require_once('db.inc.php');

if (isset($_POST['username']) && isset($_POST['pwd'])) {
    //SQL 語法
    $sql = "SELECT `username`, `pwd` 
            FROM `admin` 
            WHERE `username` = ? 
            AND `pwd` = ? ";

    $arrParam = [
        $_POST['username'], sha1($_POST['pwd'])
    ];
    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arrParam);

    if ($pdo_stmt->rowCount() > 0) {
        header("Refresh:3;url:./admin.php");
    } else {
        session_destroy();
        header("Refresh:3;url:./index.php");
        echo '登入失敗';
    }
} else {
    session_destroy();
    echo '登入失敗 請確實登入';
}
