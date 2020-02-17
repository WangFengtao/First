<?php
	// 将一个只有字母和*的字符串，转换为*在前面，字母在后面的形式。
	// 输入：***a****b***c*******d**
	// 输出：*******************abcd
	// 要求空间复杂度为O（1）

function change($str){
    $len = strlen($str);
    $j = $len-1;
    for($i = $len-2; $i >=0; $i--){
        if($str[$j] != '*'){
            $j--;
            continue;
        }
        if($str[$i] != '*'){
            $tmp = $str[$j];
            $str[$j] = $str[$i];
            $str[$i] = $tmp;
            $j--;
        }
    }
    return $str;
}

$a = '***a****b***c*******d**';
echo change($a)."\n";