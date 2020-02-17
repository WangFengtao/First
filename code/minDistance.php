<?php
// 在一维坐标中，有一些便利店，坐标为[1,5,8]，也有一些人，坐标为[8,3,7,10]，求这些人距离最近便利店的距离之和，如示例中的结果为：0+2+1+2=5
function getMinDistance1($shop,$people){
    $total = 0;
    for($i = 0; $i < count($people); $i++){
        $min = 9999999999;
        for($j = 0; $j < count($shop); $j++){
            $distance = abs($shop[$j] - $people[$i]);
            $min = $distance < $min ? $distance : $min;
        }
        $total += $min;
    }
    return $total;
}

function getMinDistance2($shop,$people){
    $total = 0;
    sort($shop);
    for($i = 0; $i < count($people); $i++){
        $min = 9999999999;
        for($j = 0; $j < count($shop); $j++){
            $distance = abs($shop[$j] - $people[$i]);
            $min = $distance < $min ? $distance : $min;
        }
        $total += $min;
    }
    return $total;
}

$shop = [1,5,8];
$people = [8,3,7,10];
echo getMinDistance1($shop,$people);