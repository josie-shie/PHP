<?php
//引用資料庫連線
require_once('./db.inc.php');

//SQL 語法
$sql = "DELETE FROM `museum` WHERE `id` = ? ";

$arrParam = [
    (int)$_GET['deleteId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./musAdmin.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./musAdmin.php");
    echo "刪除失敗";
}