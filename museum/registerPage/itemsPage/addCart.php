<?php
session_start();
require_once('../db.inc.php');

//預設訊息 (錯誤先行)
$objResponse['success'] = false;
$objResponse['info'] = "加入購物車失敗";
$objResponse['cartItemNum'] = 0;

if (!isset($_POST['cartQty']) || !isset($_POST['itemId'])) {
    header("Refresh: 9; url=./itemlist.php");
    $objResponse['info'] = "資料傳遞有誤";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$sql = "SELECT `itemId`,`itemName`,`itemImage`,`itemPrice`,`itemQty`,`created_at`,`update_at`
        FROM `items`
        WHERE `itemId` = ? ";
$arrParam = [
    (int)$_POST['itemId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll();
    $_SESSION['cart'][] = [
        "itemId" => $arr[0]["itemId"],
        "cartQty" => $_POST["cartQty"]
    ];
    header("Refresh: 3; url=./myCart.php");
    $objResponse['success'] = true;
    $objResponse['info'] = "已加入購物車";
    $objResponse['cartItemNum'] = count($_SESSION['cart']);
} else {
    header("Refresh: 3; url=./itemDetail.php?itemId={$_POST['itemId']}");
    $objResponse['info'] = "查無商品項目";
    $objResponse['cartItemNum'] = count($_SESSION['cart']);
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
