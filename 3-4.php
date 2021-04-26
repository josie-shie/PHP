<?php
//explode()
/**
* 指定分隔字元，將字串分割成另一個字串
*列（分隔字元可以使用正規表示式，並區
*分大小寫）*/
//print_r()
/**一次要將整個 Array 輸出
 * Array ( [0] => 人 [1] => 帥 [2] => 得 [3] => 體 )*/
$str03 = "人,帥,得,體";
$arr03 = explode("," , $str03);
echo $arr03[0] . $arr03[1] . $arr03[2] . $arr03[3] . "<br>";
print_r($arr03);
?>

<hr>

<?php
//implode() 將陣列的元素連結起來，成為字串
//join() 與 implode 相同
$str04_1 = implode("~", $arr03);
echo $str04_1 . "<br>";
$str04_2 = join("...", $arr03);
echo $str04_2 . "<br>";
?>

<hr>

<?php
//strlen() 查詢字串中的字元長度（個數）；一個utf-8 編碼的中文字，佔 3 個字元

//mb_strlen() 查詢字串中的字元長度（個數），可直接用於 utf-8 的文字

//strpos() 查詢字元在字串中第一次出現的位置，字元的索引值，從 0 開始；一個 utf-8 編碼的中文字，佔 3 個字元；若是沒有找到查詢字元，則回傳 FALSE

//mb_strpos() 查詢中文字元在字串中第一次出現的位置，字元的索引值，從 0 開始，可直接用於 utf-8 的文字；若是沒有找到查詢字元，則回傳 FALSE

//substr() 擷取字串中，指定開始位置，擷取字數的部分字串；不設定字數，字串會由開始位置取到最後；一個 utf-8 編碼的中文字，佔 3 個字元

//mb_substr() 擷取字串中，指定開始位置，擷取字數的部分字串；不設定字數，字串會由開始位置取到最後；可直接用於 utf-8 的文字

//
$str05_1 = "abcdefg";
$str05_2 = "懷疑人生";
echo strlen($str05_1) . "<br>";
echo mb_strlen($str05_2) . "<br>";
echo strpos($str05_1, "c") . "<br>";
echo mb_strpos($str05_2, "人") . "<br>";
echo substr($str05_1, 3, 5) . "<br>";
echo mb_substr($str05_2, 2, 3);
?>
<hr>

<?php
//str_replace(查詢字串, 取代字串,字串)  將查詢字串比對相等的所有文字部分，置換為取代字串

//str_pad(字串, 字串總長度, 填入字元[, 類型]) 將原字串填滿到指定的字串總長度；若沒有填寫類型時，預設是向右填滿；(中文字一個字=3字元)
//str_repeat(字串, 次數) 指定字串和次數，來重複字串
$str06 = "正規表達式";
echo str_replace("達", "示", $str06) . "<br>";
echo str_pad("不要", 30, "啊") . "<br>"; //所以這裡只會顯示10個字
echo "y" . str_repeat("e", 5);
?>

<hr>

<?php
//strtolower()、strtoupper() 轉換成大小寫
$str07_1 = "HELLO ";
$str07_2 = "world!";
echo strtolower($str07_1) . strtoupper($str07_2);
?>

<hr>
<?php
//md5() 將字串加密 使用 MD5 計算字串雜湊值，並返回。預設 32 個字元長度的字串。
$strOrigin = "T1st@localhost";
echo "原始資料: " . $strOrigin . "<br>";
echo "md5() 加密後: " . md5($strOrigin) . "<br>";
$strOrigin = "test@localhost";
echo "修改後資料: " . $strOrigin . "<br>";
echo "md5() 加密後: " . md5($strOrigin) . "<br>";
$strOrigin = "T1st@localhost";
echo "回復原資料: " . $strOrigin . "<br>";
echo "md5() 加密後: " . md5($strOrigin) . "<br>";
?>

<hr>
<?php
echo "原始資料: " . $strOrigin . "<br>";
echo "sha1() 加密後: " . sha1($strOrigin) . "<br>";
$strOrigin = "test@localhost";
echo "竄改後資料: " . $strOrigin . "<br>";
echo "sha1() 加密後: " . sha1($strOrigin) . "<br>";
$strOrigin = "T1st@localhost";
echo "回復原資料: " . $strOrigin . "<br>";
echo "sha1() 加密後: " . sha1($strOrigin) . "<br>";
?>

<hr>





