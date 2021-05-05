<?php
session_start();
require_once './db.inc.php';
require_once './tempelate/tpl-header.php';
require_once './tempelate/tpl-item-detail.php'; //將右邊的商品選單模組化
?>


<!-- 商品項目清單 -->
<div class="col-md-9 col-sm-8">
    <?php
    if (isset($_GET['itemId'])) {
        //SQL 敘述
        $sql = "SELECT `items`.`itemId`, `items`.`itemName`, `items`.`itemImg`, `items`.`itemPrice`, 
                    `items`.`itemQty`, `items`.`itemCategoryId`, `items`.`created_at`, `items`.`updated_at`,
                    `categories`.`categoryId`, `categories`.`categoryName`
                FROM `items` INNER JOIN `categories`
                ON `items`.`itemCategoryId` = `categories`.`categoryId`
                WHERE `itemId` = ? ";

        $arrParam = [
            (int)$_GET['itemId'] 
        ];

        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);

        //若商品項目個數大於 0，則列出商品
        if ($stmt->rowCount() > 0) {
            $arrItem = $stmt->fetchAll()[0];
    ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <!--  -->
                        <div class="row mb-3 d-flex justify-content-center">
                            <img class="item-view border" src="./images/items/<?php echo $arrItem["itemImg"]; ?>">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p>商品名稱：<?php echo $arrItem["itemName"] ?></p>
                        <p>商品價格：<?php echo $arrItem["itemPrice"] ?></p>
                        <p>商品數量：<?php echo $arrItem["itemQty"] ?></p>
                        <form name="cartForm" id="cartForm" method="POST" action="./addCart.php">
                            <label>數量：</label>

                            <!-- 設定數量 -->
                            <input type="number" name="cartQty" value="1" maxlength="5" min="1" max="<?php echo $arrItem["itemQty"] ?>">

                            <!-- 隱藏元素，配合加入購物車使用 -->
                            <input type="hidden" name="itemId" value="<?php echo (int)$_GET['itemId'] ?>">

                            <input type="submit" class="btn btn-primary btn-lg" name="smb" value="加入購物車">
                        </form>
                    </div>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>
</div>
</div>



<?php require_once './tempelate/tpl-footer.php'; ?>