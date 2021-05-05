<?php
//引用資料庫連線
require_once('./db.inc.php');
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<form name="myForm" method="POST" action="musUpdate.php" enctype="multipart/form-data">
    <table class="border">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`, `museumId`, `museumName`
                FROM `museum` 
                WHERE `id` = ?";

        //設定繫結值
        $arrParam = [(int)$_GET['editId']];

        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        $arr = $stmt->fetchAll();

        if(count($arr) > 0) {
        ?>
            <tr>
                <td class="border">美術館編號</td>
                <td class="border">
                    <input type="text" name="museumId" value="<?php echo $arr[0]['museumId']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">美術館編號</td>
                <td class="border">
                    <input type="text" name="museumName" value="<?php echo $arr[0]['museumName']; ?>" maxlength="20" />
                </td>
            </tr>
        <?php
        } else {
        ?>
            <>
                <td class="border" colspan="2">沒有資料</td>
            </>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
            <td class="border" colspan="2"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="editId" value="<?php echo (int)$_GET['editId']; ?>">
</form>
</body>
</html>