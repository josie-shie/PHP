<?php
$cookie_name = "username";
$cookie_value = "darren";
//setcookie(cookie名稱, cookie值, 有效的期限, 存放路徑)
//time() => January 1 1970 00:00:00 GMT）起的當前時間的秒数
// 86400 = 1 天， 86400 * 15 = 15 天=>存取15天
setcookie($cookie_name, $cookie_value, time() + 60, "/");
?>

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
    //第一次刷新結果都會是未存取,需要第二次刷新才會存取
    //如果 cookie 不存在，則顯示尚未設定
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie '{$cookie_name}' 還沒有設定…";
    } else { //若是設定，則顯示 cookie 內容
        echo "Cookie '{$cookie_name}' 已經設定。<br>";
        echo "Cookie '{$cookie_name}' 的值是: {$_COOKIE[$cookie_name]}";
    }
    ?>
</body>

</html>