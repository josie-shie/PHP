<?php
//引用資料庫連線
require_once('./db.inc.php');


//先對其它欄位，進行 SQL 語法字串連接
$sql = "UPDATE `museum` 
        SET 
        `museumId` = ?, 
        `museumName` = ?,
        WHERE `id` = ?";

//先對其它欄位進行資料繫結設定
$arrParam = [
    $_POST['museumId'],
    $_POST['museumName'],
    (int)$_POST['editId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if( $stmt->rowCount() > 0 ){
    header("Refresh: 3; url=./musAdmin.php");
    echo "更新成功";
} else {
    header("Refresh: 3; url=./musAdmin.php");
    echo "沒有任何更新";
}