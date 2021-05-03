<?php
require_once './checkAdmin.php';
require_once '../db.inc.php';

//預設訊息
$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = "刪除失敗";

header("Refresh: 3; url=./category.php");

//刪除類別
if( isset($_GET['deleteCategoryId']) ){
    $sql = "DELETE FROM `categories` WHERE `categoryId` = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([(int)$_GET['deleteCategoryId']]);
    if($stmt->rowCount() > 0) {
        $objResponse['success'] = true;
        $objResponse['info'] = "刪除成功";

    }
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE); 
//純前端是不需要印出json_encode() 
//json_encode 是讓系統判斷資料是否有存取成功(true flase判斷)