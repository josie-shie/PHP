<?php
//判斷上傳是否成功 (error === 0)
//error為0代表上傳成功 不為0都是失敗 不同數字代表不同失敗原因
if ($_FILES["fileUpload"]["error"] === 0) {
    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    $isSuccess = move_uploaded_file(
        // 搬動檔案 move_uploaded_file(站存路徑,預計存放路徑與自訂檔名)
        $_FILES["fileUpload"]["tmp_name"], //上傳暫存路徑
        "./tmp/" . $_FILES["fileUpload"]["name"] //實際存放路徑與自訂檔名
    );
    //判斷上傳是否成功
    if ($isSuccess) {
        echo "上傳成功!!<br />";
        echo "檔案名稱: " . $_FILES["fileUpload"]["name"] . "<br />";
        echo "檔案類型: " . $_FILES["fileUpload"]["type"] . "<br />";
        echo "檔案大小: " . $_FILES["fileUpload"]["size"] . "<br />";
    } else { //檔案移動失敗，則顯示錯誤訊息
        echo "上傳失敗…<br />";
        echo "<a href='javascript:windows.history.back();'>回上一頁
</a>";
    }
}
