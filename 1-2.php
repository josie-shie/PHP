<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php echo "挖嘎挖嘎 欸欸欸欸" ?>

    <!--「echo」是輸出資料的語法，不用加括號，類似 print 的效果。-->
    <?php echo "每天都被自己帥醒，壓力好大" ?>

    <?php
    //單行註解

    /**
     * 多行註解
     * 1.
     * 2.
     * 3.
     */
    ?>

    <?php
    //PHP 標籤換行，則程式碼需要分號結尾
    echo "Hello World!<br>";
    echo "Hello PHP!";
    ?>

    <?php for ($i = 0; $i < 10; $i++) { ?>
        <div><?php echo $i ?></div>
    <?php } ?>




</body>

</html>