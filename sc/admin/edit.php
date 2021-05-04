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
</head>

<body>
    <?php require_once('./templates/title.php'); ?>
    <hr />
    <h3>商品列表</h3>
    <form name="myForm" enctype="multipart/form-data" method="POST" action="update.php">
        <table>
            <thead>
                <tr>
                    <th class="border">商品名稱</th>
                    <th class="border">商品照片路徑</th>
                    <th class="border">商品價格</th>
                    <th class="border">商品數量</th>
                    <th class="border">商品種類</th>
                    <th class="border">新增時間</th>
                    <th class="border">更新時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border">
                        <input type="text" name="itemName" value="" maxlength="100" />
                    </td>
                    <td class="border">
                        <input type="file" name="itemImg" value="" />
                    </td>
                    <td class="border">
                        <input type="text" name="itemPrice" value="" maxlength="11" />
                    </td>
                    <td class="border">
                        <input type="text" name="itemQty" value="" maxlength="3" />
                    </td>
                    <td class="border">
                        <select name="itemCategoryId">
                            <?php
                            $sql = "SELECT `categoryId`, `categoryName` FROM `categories`";
                            $stmt = $pdo->qury($sql);
                            if ($stmt->rowCount() > 0) {
                                $arr = $stmt->fetchAll();
                                for ($i = 0; $i < count($arr); $i++) {
                            ?>
                                    <option value="<?php echo $arr[$i]['categoryId'] ?>"><?php echo $arr[$i]['categoryName'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</body>

</html>