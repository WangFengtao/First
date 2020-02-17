<?php
function divide($dividend, $divisor) {
    $max = 0x80000000;
    $count = 0;
    $sign = ($dividend > 0) ^ ($divisor > 0);
    if($dividend > 0){
        $dividend = -$dividend;
    }
    if($divisor > 0){
        $divisor = -$divisor;
    }
    while($dividend <= $divisor){
        $tmpResult = -1;
        $tmpDivisor = $divisor;
        while($dividend <= ($tmpDivisor << 1)){
            if($tmpDivisor <= -$max >> 1){
                break;
            }
            $tmpResult = $tmpResult << 1;
            $tmpDivisor = $tmpDivisor << 1;
            echo 'tmpDivisor:'.$tmpDivisor."\n";
            echo 'tmpResult:'.$tmpResult."\n";
        }
        $dividend -= $tmpDivisor;
        $count += $tmpResult;
        echo 'dividend:'.$dividend."\n";
        echo 'count:'.$count."\n";
    }
    if(!$sign){
        if($count <= -$max){
            return $max-1;
        }
        $count = -$count;
    }
    return $count;
}

$a = 1000;
$b = -3;
$res = divide($a,$b);
echo $res."\n";