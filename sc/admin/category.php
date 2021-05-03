<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPYE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>我的 PHP 程式</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            .border {
                border: 1px solid;
            }
        </style>
    </head>

    <body>

        <?php require_once('./templates/title.php'); ?>

        <hr />

        <h3>編輯類別</h3>
        <form name="myForm" method="POST" action="./insertCategory.php">

            <?php
            //撈出資料庫的資料
            $sql = "SELECT `categoryId`, `categoryName` FROM `categories` ";
            $stmt = $pdo->query($sql);
            if ($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll();
            ?>

                <ul class="mr-y-2">

                    <?php for ($i = 0; $i < count($arr); $i++) { ?>
                        <li class="m-y-2"><?php echo $arr[$i]['categoryName'] ?>
                            | <a href="./editCategory.php?editCategoryId=<?php echo $arr[$i]['categoryId'] ?>">編輯</a>
                            | <a href="./deleteCategory.php?deleteCategoryId=<?php echo $arr[$i]['categoryId'] ?>">刪除</a>
                        </li>
                    <?php } ?>

                <?php } ?>

                </ul>

                <table class="border">
                    <thead>
                        <tr>
                            <th class="border">類別名稱</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border">
                                <input type="text" name="categoryName" value="" maxlength="100" /><!--最大字數限制最好跟MYSQL限制的字數一致-->
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="border"><input type="submit" name="smb" value="新增"></td>
                        </tr>
                    </tfoot>
                </table>

        </form>
    </body>

    </html>

    