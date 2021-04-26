<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid;
        }

        table th {
            border: 1px dashed;
        }

        table td {
            border: 1px dotted;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <th>姓名</th>
        </thead>
        <tbody>
            <?php
            //學生姓名陣列初始化
            $arrStudent = ["Alex", "Bill", "Carl", "Darren"];
            //count() 函式幫助我們計算陣列的長度
            for ($i = 0; $i < count($arrStudent); $i++) {
                echo "<tr><td>" . $arrStudent[$i] . "</td></tr>";
            }

            ?>

        

        </tbody>
    </table>

    <?php
    /**
    *
    *$Arr= array('A'  => array('1', '2', '3'),
    *'B'  => array('4', '5','6'));
    *echo count($Arr, COUNT_RECURSIVE);
    *?>
    *輸出結果：8

    *我們先準備了一個二維陣列 $Arr，第一層有兩個陣列元素，第二層各有三個元素，接著我們用 PHP count 去統計 $Arr 總共有多少個陣列元素，所以 count 的 $mode 填入 COUNT_RECURSIVE，或者是填入 1 也可以，count 出來的值剛好是 8。如果我們只有寫 count($Arr) 的話，這樣就只能統計出 2 這樣的結果，因為沒有加入 $mode，所以 count 僅會統計第一層。
    */
    
</body>

</html>