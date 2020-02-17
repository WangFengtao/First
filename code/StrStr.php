<?php
function newStrStr($haystack, $needle) {
    if($needle == ''){
        return 0;
    }
    $start = -1;
    $hLen = strlen($haystack);
    $nLen = strlen($needle);
    for($i = 0; $i < $hLen; $i++){
        for($j = 0; $j < $nLen; $j++){
            if($haystack[$i] != $needle[$j]){
                break;
            }
            if($haystack[$i] == $needle[$j]){
                if($j == 0){
                    $start = $i;
                }
                if($j == $nLen-1){
                    return $start;
                }
            }
            
        }
    }
    return -1;
}

$haystack = 'abcdefaaaa';
$needle = 'fa';
$res = newStrStr($haystack,$needle);
var_dump($res);