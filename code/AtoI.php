<?php
class AtoI {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $output = '';
        $len = strlen($str);
        $pattern = '/^-|\+|[1-9]/';
        $max = 0x7fffffff;
        $firstChar = $str[0];
        preg_match($pattern,$firstChar,$matches);
        if($firstChar != ' ' && empty($matches)){
            return 0;
        }
        for($i = 0; $i < $len; $i++){
            $char = $str[$i];
            if($char == ' ' && $output == ''){
                continue;
            }
            preg_match($pattern,$char,$match);
            if(!empty($match)){
                $output .= $char;
            }else{
                break;
            }
        }
        if(empty($output)){
            return 0;
        }elseif($output >= $max){
            return $max;
        }elseif($output < -$max){
            return -$max-1;
        }else{
            return intval($output);
        }
    }
}

$str = '-2147483647';
$obj = new AtoI();
$res = $obj->myAtoi($str);
var_dump($res);

// $pattern = '/-|[1-9]|\+/';
// $first = $str[0];
// preg_match($pattern,$first,$match);
// var_dump($match);

// $a = ' ';
// var_dump($a != ' ');