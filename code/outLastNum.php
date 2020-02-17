<?php
// 	输入一个数组，如[1,2,3,4,5,6,7,8,9,10]，按照第1行放1个，第2行放3个，第三行放5个，第n行放(n-1)*2+1个，如下所示
// 	1
// 	2,3,4
// 	5,6,7,8,9
// 	10
// 最后将每行最后一个元素输出，输出为：[1,4,9,10]
function lastNum($arr){
    $len = count($arr);
    $n = 1;
    $k = [];
    for($i = 1; $i <= $len; $i++){
        if(($i == $len && $i != $n*$n) || $i == $n*$n){
            $k[] = $arr[$i-1];
            $n++;
        }
    }
    return $k;
}

$arr = [1,2,3,4,5,6,7,8,9,10];
$ret = lastNum($arr);
var_dump($ret);