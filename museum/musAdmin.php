<?php
require_once './db.inc.php';

//---要製作分頁概念需要先得到資料總比數---
$sqlTotal = "SELECT count(1) AS `count`
              FROM`museum`";
$stmtTotal = $pdo->query($sqlTotal);
$arrTotal = $stmtTotal->fetchAll()[0];
$total = $arrTotal['count'];


$numPerpage = 8;
$totalPage = ceil($total / $numPerpage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .border {
            border: 1px solid burlywood;
        }

        .w200px {
            width: 200 px;
        }
    </style>

</head>

<body>
    <?php require_once './templates/title.php';?>
    <form name="myForm" method="POST" action="deleteIds.php">
        <table class="border">
            <thead>
                <tr>
                    <th class="border">選擇</th>
                    <th class="border">美術館編號</th>
                    <th class="border">美術館名稱</th>
                    <th class="border">編輯館別</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT `id`,`museumId`, `museumName`
                            FROM `museum` 
                            ORDER BY `id` ASC
                            LIMIT ?,?";

                $arrParam = [
                    ($page - 1) * $numPerpage,
                    $numPerpage
                ];

                //查詢分頁後的學生資料
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);

                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll();
                    for ($i = 0; $i < count($arr); $i++) {
                ?>
                        <tr>
                            <td class="border">
                                <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id'] ?>" />
                            </td>
                            <td class="border"><?php echo $arr[$i]['museumId'] ?></td>
                            <td class="border"><?php echo $arr[$i]['museumName'] ?></td>
                            <td class="border">
                            <a href="./musEdit.php?editId=<?php echo $arr[$i]['id']; ?>">編輯</a>
                            <a href="./musDelet.php?deleteId=<?php echo $arr[$i]['id']; ?>">刪除</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td class="border" colspan="9">沒有資料</td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td class="border" colspan="9">
                        <!--colspan=要跨幾欄-->
                        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                            <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                            <!-- <a href="?page顯示當前的頁面"</?php 連結的文字 ></a>   -->
                            <!-- 用php包覆是為了好維護html -->
                        <?php } ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <input type="submit" name="smb" value="刪除">
    </form>

</body>

</html>