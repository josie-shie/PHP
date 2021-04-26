<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>Document</title>
</head>
<body>
<?php
//nl2br() 以 HTML 的 <br> 取代分行字元（\n）
$str01 = "小明:「我重要嗎？」\n 小美:「再重都要。」";
echo nl2br($str01);
?>
<hr>
<?php
//trim()、ltrim()、rtrim()
$str02 = " 我想妳一定很忙，所以只要看前三個字就好… ";
echo trim($str02)."<br>"; //去除字串「起始處」與「結束處」的空白
echo ltrim($str02)."<br>";//去除字串「起始處」的空白
echo rtrim($str02);//去除字串「結束處」的空白
?>