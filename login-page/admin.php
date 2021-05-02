<?php
require_once 'db.inc.php';

//---要製作分頁概念需要先得到資料總比數---
$sqlTotal = "SELECT count(1) AS `count`
              FROM`students`";
$stmtTotal = $pdo->query($sqlTotal);
$arrTotal = $stmtTotal->fetchAll()[0];
$total = $arrTotal['count'];


$numPerpage = 2;
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

    這裡是後端管理頁面 - <a href="./admin.php">通訊錄全覽</a> | <a href="./new.php">新增頁面</a> | <a href="./logout.php?logout=1">登出</a>
    <hr />
    <form name="myForm" method="POST" action="deleteIds.php">
        <table class="border">
            <thead>
                <tr>
                    <th class="border">選擇</th>
                    <th class="border">學號</th>
                    <th class="border">姓名</th>
                    <th class="border">性別</th>
                    <th class="border">生日</th>
                    <th class="border">手機號碼</th>
                    <th class="border">個人描述</th>
                    <!-- <th class="border">大頭貼</th> -->
                    <th class="border">功能</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT `id`,`studentId`, `studentName`, `studentGender`, `studentBirthday`, 
                    `studentPhoneNumber`, `studentDescription`
                            FROM `students` 
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
                            <td class="border"><?php echo $arr[$i]['studentId'] ?></td>
                            <td class="border"><?php echo $arr[$i]['studentName'] ?></td>
                            <td class="border"><?php echo $arr[$i]['studentGender'] ?></td>
                            <td class="border"><?php echo $arr[$i]['studentBirthday'] ?></td>
                            <td class="border"><?php echo $arr[$i]['studentPhoneNumber'] ?></td>
                            <td class="border"><?php echo nl2br($arr[$i]['studentDescription']) ?></td>
                            <td class="border">
                                <a href="./edit.php?id=<?php echo $arr[$i]['id']; ?>">編輯</a>
                                <a href="./delete.php?id=<?php echo $arr[$i]['id']; ?>">刪除</a>
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
    </form>

</body>

</html>