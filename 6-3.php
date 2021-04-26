<?php

//建立陣列 方法一
$myArray = [
    "myName" => "Alex",
    "myHeight" => 160,
    "myWeight" => 90
];

print_r($myArray);
echo "<hr>";

//建立陣列 方法二 (較推薦此方法)
$myArray = [];
$myArray['myName'] = 'Alex';
$myArray['myHeight'] = 160;
$myArray['myWeight'] = 90;
echo "大家好，我的名字是 " . $myArray['myName'] . "，";
echo "我的身高是 " . $myArray['myHeight'] . "，";
echo "我的體重是 " . $myArray['myWeight'] . "。";
