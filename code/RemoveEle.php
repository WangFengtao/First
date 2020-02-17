<?php
function removeElement(&$nums, $val) {
    for($i = 0, $j = count($nums)-1;$i <= $j; $i++,$j--){
        if($nums[$i] == $val){
            unset($nums[$i]);
        }
        if($nums[$j] == $val){
            unset($nums[$j]);
        }
    }
}

$arr = [2,3,3,2,2];
$key = 3;
removeElement($arr,$key);
var_dump($arr);