<?php
//引用資料庫連線
require_once('./db.inc.php');

//SQL 敘述
$sql = "INSERT INTO `museum` 
        (`museumId`, `museumName`) 
        VALUES (?, ?)";

//繫結用陣列
$arr = [
    $_POST['museumId'],
    $_POST['museumName'],
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() === 1) {
    header("Refresh: 3; url=./musAdmin.php");
    echo "新增成功";
} else {
    header("Refresh: 3; url=./musAdmin.php");
    echo "新增失敗";
}
