<?php
function getMidian($arr1, $arr2){
    if(empty($arr1) || empty($arr2)){
        return 0;
    }
    $start1 = 0;
    $start2 = 0;
    $end1 = count($arr1)-1;
    $end2 = count($arr2)-1;
    $mid1 = 0;
    $mid2 = 0;
    $offset = 0;
    while($start1 < $end1){
        $mid1 = intval(($start1+$end1)/2);
        $mid2 = intval(($start2+$end2)/2);
        $offset = ($end1-$start1+1)%2 == 0 ? 1 : 0;
        if($arr1[$mid1] > $arr2[$mid2]){
            $end1 = $mid1;
            $start2 = $mid2 + $offset;
        }elseif($arr1[$mid1] < $arr2[$mid2]){
            $start1 = $mid1 + $offset;
            $end2 = $mid2;
        }else{
            return $arr1[$mid1];
        }
    }
    return min($arr1[$start1],$arr2[$start2]);
}

$arr1 = [1,2,3,4];
$arr2 = [6,7,8,9];
$ret = getMidian($arr1,$arr2);
var_dump($ret);