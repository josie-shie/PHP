
<?php
session_start();

//引用資料庫連線
require_once('./db.inc.php');

//預設訊息 (錯誤先行 以使用者登入失敗為前提) 
$objResponse['success'] = false;
$objResponse['info'] = "登入失敗";

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    //依據使用者選擇的為賣家(admin)或買家(users)取得不同資料表
    switch($_POST['identity']){
        case 'admin':
            //SQL 語法
            $sql = "SELECT `username`, `pwd`, `name`
                    FROM `admin` 
                    WHERE `username` = ? 
                    AND `pwd` = ? ";
        break;

        case 'users':
            //SQL 語法
            $sql = "SELECT `username`, `pwd`, `name`
                    FROM `users`
                    WHERE `username` = ? 
                    AND `pwd` = ? 
                    AND `isActivated` = 1 ";
        break;
    }
    //prepare 阻擋攻擊 execute帶入問號
    $arrParam = [
        $_POST['username'],
        sha1($_POST['pwd'])
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
    
    //如果修改列數大於0 表示有此使用者
    if( $stmt->rowCount() > 0 ){
        //取得資料
        $arr = $stmt->fetchAll()[0];
        
        //3 秒後跳頁
        if($_POST['identity'] === 'admin')
            header("Refresh: 3; url=./admin/admin.php");
        elseif($_POST['identity'] === 'users') 
            header("Refresh: 3; url=./index.php");//買家要跳回首頁才合理

        
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $arr['username'];
        $_SESSION['name'] = $arr['name'];
        $_SESSION['identity'] = $_POST['identity'];

        $objResponse['success'] = true; //將錯誤先行的預設fales改為true
        $objResponse['info'] = "登入成功!!! 權限為「{$_SESSION['identity']}」，3秒後自動進入頁面";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE); //可以把PHP的陣例完美的轉換成json format
        exit();
    }
} else {
    $objResponse['info'] = "請確實登入…3秒後自動回登入頁";
}

header("Refresh: 3; url=./index.php");
echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);