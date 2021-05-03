<?php
require_once './checkAdmin.php';
require_once '../db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    .border {
        border: 1px solid;
    }
    img.itemImg {
        width: 250px;
    }
    </style>
</head>
<body>
    <?php require_once('./templates/title.php'); ?>
    <hr />
    <h3>商品列表</h3>
    <form name="myForm" method="POST" action="updateCategory.php">
        <table class="border">
            <thead class="">
                <tr>
                    <th class="border ">種類名稱</th>
                    <th class="border">新增時間</th>
                    <th class="border">更新時間</th>
                </tr>
            </thead>
            <tbody>
            <?php
            //SQL 擷取資料表內容
            $sql = "SELECT `categoryId`, `categoryName`, `created_at`, `updated_at`
                    FROM  `categories`
                    WHERE `categoryId` = ? ";

            $arrParam = [
                (int)$_GET['editCategoryId'] //(int)強制轉為數字
            ];

            //查詢
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

            //資料數量大於 0，則列出相關資料
            if($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll()[0];
            ?>
                <tr>
                    <td class="border">
                        <input type="text" name="categoryName" value="<?php echo $arr['categoryName']; ?>" maxlength="100" />
                    </td>
                    <td class="border"><?php echo $arr['created_at']; ?></td>
                    <td class="border"><?php echo $arr['updated_at']; ?></td>
                </tr>
            <?php
            } else {
            ?>
                <tr>
                    <td colspan="3">沒有資料</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                <?php if($stmt->rowCount() > 0){ ?>
                    <td class="border" colspan="3"><input type="submit" name="smb" value="更新"></td>
                <?php } ?>
                </tr>
            </tfoo>
        </table>
        <input type="hidden" name="editCategoryId" value="<?php echo (int)$_GET['editCategoryId']; ?>">
    </form>
</body>
</html>

