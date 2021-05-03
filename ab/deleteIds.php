<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('./db.inc.php'); //引用資料庫連線

//將所有 id 透過「,」結合在一起，例如「1,2,3」
$strIds = join(",", $_POST['chk']); //join(物件與物間中間的符號,要join的對象)

//記錄資料表刪除數量
$count = 0;

//先查詢出所有 id 資料欄位中的大頭貼檔案名稱
$sqlGetImg = "SELECT `studentImg` FROM `students` WHERE FIND_IN_SET(`id`, ?) ";
$stmtGetImg = $pdo->prepare($sqlGetImg);
$stmtGetImg->execute([$strIds]);
if( $stmtGetImg->rowCount() > 0 ){
    //取得所有大頭貼檔案名稱
    $arrImg = $stmtGetImg->fetchAll();

    //先確認刪除大頭貼
    for($i = 0; $i < count($arrImg); $i++){
        //若是 studentImg 裡面不為空值，代表過去有上傳過
        if($arrImg[$i]['studentImg'] !== NULL){
            //刪除實體檔案
            @unlink("./files/".$arrImg[$i]['studentImg']);
        }  
    }

    //刪除完大頭貼再刪除資料表
    $sqlDelete = "DELETE FROM `students` WHERE FIND_IN_SET(`id`, ?) ";
    $stmtDelte = $pdo->prepare($sqlDelete);
    //$arrParam=['$strIds'] 因為物件屬性明確因此可以省略這句
    $stmtDelte->execute([$strIds]);
    $count = $stmtDelte->rowCount(); //此時count為刪除的列數
}

header("Refresh: 3; url=./admin.php");
if($count > 0) {
    echo "刪除成功";
} else {
    echo "刪除失敗";
}