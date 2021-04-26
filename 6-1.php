<?php
//陣列初始化
// 舊寫法 $arr = array('Alex', 'Bill', 'Carl', 'Darren');
$arr = ['Alex', 'Bill', 'Carl', 'Darren'];
//指定索引，印出相對應的值
echo "印出 {$arr[3]}"; //印出 Darren

//新增兩個值，在陣列的尾端
$arr[] = "Eric";
$arr[] = "Fox";

echo "<hr>";

//指定索引，印出相對應的值
echo "新增了 {$arr[4]} 和 {$arr[5]}";

echo "<hr>";
//使用 for 迴圈，逐一輸出陣列中的值
for($i = 0; $i < count($arr); $i++){  //count(陣列名稱)會計算出陣列長度
echo $arr[$i] . "&nbsp;";
}