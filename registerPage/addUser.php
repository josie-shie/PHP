<?php
session_start();
require_once 'db.inc.php';
$objResponse['success'] = 'false';
$objResponse['info'] = '請輸入完整資料';

if ($_POST["username"] == "" || $_POST["pwd"] == "" || $_POST["name"] == "" || $_POST["gender"] == "" || $_POST["phoneNumber"] == "") {
    header("Refresh:9; url=./index-particles.php");
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

$sql = "INSERT INTO `users`(`username`,`pwd`,`name`,`gender`,`phoneNumber`)
       VALUE (?,?,?,?,?)";

$arrParam = [
    $_POST["username"],
    $_POST["pwd"],
    $_POST["name"],
    $_POST["gender"],
    $_POST["phoneNumber"]
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["pwd"] = $_POST["pwd"];
    header("Refresh: 9; url=./index-particles.php");

    //註冊 session
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["name"] = $_POST["name"];

    $objResponse['success'] = true;
    $objResponse['info'] = "註冊成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
} else {
    header("Refresh: 9; url=./index-particles.php");
    $objResponse['info'] = "註冊失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}
