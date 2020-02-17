<?php
function revert($x){
    $max = 0x7fffffff;
    
    $b = 0;
    while($x != 0){
        $b = $b*10 + $x%10;
        $x = intval($x/10);
    }
    if($x > $max || $x < -1*($max+1)){
        return 0;
    }
    return ($b > $max || $b < -1*($max+1))?0:$b;
}

$x = 1534236469;
$y = 0x80000000;
$b = revert($x);
echo $b;
